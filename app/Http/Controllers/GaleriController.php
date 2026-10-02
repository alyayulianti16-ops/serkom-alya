<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data['galeris'] = Galeri::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('keterangan', 'like', "%{$search}%");
        })
        ->orderBy('tanggal', 'desc')
        ->get();

        return view('galeri.index', $data);
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string|max:50',
            'keterangan' => 'required|string',
            'kategori'   => 'required|in:foto,video',
            'tanggal'    => 'required|date',
            'file'       => $request->kategori === 'foto' 
                            ? 'required|image|mimes:jpeg,png,jpg,webp|max:2048' 
                            : 'required|file|mimes:mp4,mkv,avi|max:20480',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('galeri', 'public');
        }

        Galeri::create([
            'judul'      => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori'   => $request->kategori,
            'tanggal'    => $request->tanggal,
            'file'       => $filePath,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id_galeri') ?? $request->query('id');

        if ($id) {
            $idDecrypted = decrypt($id);
            $galeri = Galeri::where('id_galeri', $idDecrypted)->first();

            if ($galeri) {
                return view('galeri.edit', compact('galeri'));
            }
        }

        return redirect()->route('galeri.index')->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request)
    {
        $id = decrypt($request->id_galeri);
        $galeri = Galeri::where('id_galeri', $id)->first();

        if (!$galeri) {
            return redirect()->route('galeri.index')->with('error', 'Data tidak ditemukan.');
        }

        $request->validate([
            'judul'      => 'required|string|max:50',
            'keterangan' => 'required|string',
            'kategori'   => 'required|in:foto,video',
            'tanggal'    => 'required|date',
            'file'       => $request->kategori === 'foto' 
                            ? 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048' 
                            : 'nullable|file|mimes:mp4,mkv,avi|max:20480',
        ]);

        $input = [
            'judul'      => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori'   => $request->kategori,
            'tanggal'    => $request->tanggal,
        ];

        if ($request->hasFile('file')) {
            if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
                Storage::disk('public')->delete($galeri->file);
            }
            $input['file'] = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update($input);

        return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $id = decrypt($request->id_galeri);
        $galeri = Galeri::where('id_galeri', $id)->first();

        if ($galeri) {
            if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
                Storage::disk('public')->delete($galeri->file);
            }

            $galeri->delete();
            return redirect()->route('galeri.index')->with('success', 'Data galeri berhasil dihapus.');
        }

        return redirect()->route('galeri.index')->with('error', 'Data tidak ditemukan.');
    }
}