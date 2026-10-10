<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class beritaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data['beritas'] = berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('isi', 'like', "%{$search}%");
        })
        ->orderBy('tanggal', 'desc')
        ->get();

        return view('berita.index', $data);
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:50|unique:beritas,judul',
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'status'  => 'required|in:draf,publish',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'judul.unique' => 'Judul berita sudah ada, gunakan judul lain.',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        $userId = $request->user()->id_user ?? 1;

        berita::create([
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'status'  => $request->status,
            'gambar'  => $gambarPath,
            'id_user' => $userId,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id_berita') ?? $request->query('id');

        if ($id) {
            $idDecrypted = decrypt($id);
            $berita = berita::find($idDecrypted);

            if ($berita) {
                return view('berita.edit', compact('berita'));
            }
        }

        return redirect()->route('berita.index')->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request)
    {
        $id = decrypt($request->id_berita);
        $berita = berita::find($id);

        if (!$berita) {
            return redirect()->route('berita.index')->with('error', 'Data tidak ditemukan.');
        }

        $request->validate([
            'judul'   => 'required|string|max:50|unique:beritas,judul,' . $id . ',id_berita',
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'status'  => 'required|in:draf,publish',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'judul.unique' => 'Judul berita sudah ada, gunakan judul lain.',
        ]);

        $input = [
            'judul'   => $request->judul,
            'isi'     => $request->isi,
            'tanggal' => $request->tanggal,
            'status'  => $request->status,
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $input['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($input);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $id = decrypt($request->id_berita);
        $berita = berita::find($id);

        if ($berita) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $berita->delete();
            return redirect()->route('berita.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('berita.index')->with('error', 'Data tidak ditemukan.');
    }
}
