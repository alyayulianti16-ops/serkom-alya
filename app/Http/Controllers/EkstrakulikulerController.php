<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ekstrakulikuler;
use Illuminate\Support\Facades\Storage;

class EkstrakulikulerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data['ekskul'] = ekstrakulikuler::when($search, function ($query, $search) {
            return $query->where('nama_ekskul', 'like', "%{$search}%")
                         ->orWhere('pembina', 'like', "%{$search}%");
        })
        ->orderBy('nama_ekskul', 'asc')
        ->get();

        return view('ekstrakurikuler.index', $data);
    }

    public function create()
    {
        return view('ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul'    => 'required|string|max:40|unique:ekstrakulikulers,nama_ekskul',
            'pembina'        => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi'      => 'required|string',
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_ekskul.unique' => 'Nama ekstrakurikuler sudah ada, gunakan nama lain.',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        ekstrakulikuler::create([
            'nama_ekskul'    => $request->nama_ekskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
            'gambar'         => $gambarPath,
        ]);

        return redirect()->route('ekstrakurikuler.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id_eskul') ?? $request->query('id');

        if ($id) {
            $idDecrypted = decrypt($id);
            $ekskul = ekstrakulikuler::where('id_eskul', $idDecrypted)->first();

            if ($ekskul) {
                return view('ekstrakurikuler.edit', compact('ekskul'));
            }
        }

        return redirect()->route('ekstrakurikuler.index')->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request)
    {
        $id = decrypt($request->id_eskul);
        $ekskul = ekstrakulikuler::where('id_eskul', $id)->first();

        if (!$ekskul) {
            return redirect()->route('ekstrakurikuler.index')->with('error', 'Data tidak ditemukan.');
        }

        $request->validate([
            'nama_ekskul'    => 'required|string|max:40|unique:ekstrakulikulers,nama_ekskul,' . $id . ',id_eskul',
            'pembina'        => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi'      => 'required|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_ekskul.unique' => 'Nama ekstrakurikuler sudah ada, gunakan nama lain.',
        ]);

        $input = [
            'nama_ekskul'    => $request->nama_ekskul,
            'pembina'        => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi'      => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            if ($ekskul->gambar && Storage::disk('public')->exists($ekskul->gambar)) {
                Storage::disk('public')->delete($ekskul->gambar);
            }
            $input['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekskul->update($input);

        return redirect()->route('ekstrakurikuler.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $id = decrypt($request->id_eskul);
        $ekskul = ekstrakulikuler::where('id_eskul', $id)->first();

        if ($ekskul) {
            if ($ekskul->gambar && Storage::disk('public')->exists($ekskul->gambar)) {
                Storage::disk('public')->delete($ekskul->gambar);
            }

            $ekskul->delete();
            return redirect()->route('ekstrakurikuler.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('ekstrakurikuler.index')->with('error', 'Data tidak ditemukan.');
    }
}
