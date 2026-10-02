<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ekstrakulikuler;
use Illuminate\Support\Facades\Storage;

class EkstrakulikulerController extends Controller
{
    public function index(Request $request)
    {
        $query = ekstrakulikuler::query();

        if ($request->filled('search')) {
            $query->where('nama_ekskul', 'like', '%' . $request->search . '%')
                  ->orWhere('pembina', 'like', '%' . $request->search . '%');
        }

        $ekskul = $query->latest()->get();

        return view('ekstrakurikuler.index', compact('ekskul'));
    }

    public function create()
    {
        return view('ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul'    => 'required|string|max:40',
            'pembina'        => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi'      => 'required|string',
            'gambar'         => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('ekstrakurikuler', 'public');

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
        $id = $request->id ?? $request->id_eskul;
        $ekskul = ekstrakulikuler::where('id_eskul', $id)->first();

        if ($ekskul) {
            return view('ekstrakurikuler.edit', compact('ekskul'));
        }

        return redirect()->route('ekstrakurikuler.index')->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id_eskul'       => 'required',
            'nama_ekskul'    => 'required|string|max:40',
            'pembina'        => 'required|string|max:40',
            'jadwal_latihan' => 'required|string|max:40',
            'deskripsi'      => 'required|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $ekskul = ekstrakulikuler::where('id_eskul', $request->id_eskul)->first();

        if ($ekskul) {
            $data = [
                'nama_ekskul'    => $request->nama_ekskul,
                'pembina'        => $request->pembina,
                'jadwal_latihan' => $request->jadwal_latihan,
                'deskripsi'      => $request->deskripsi,
            ];

            if ($request->hasFile('gambar')) {
                if ($ekskul->gambar && Storage::disk('public')->exists($ekskul->gambar)) {
                    Storage::disk('public')->delete($ekskul->gambar);
                }
                $data['gambar'] = $request->file('gambar')->store('ekstrakulikuler', 'public');
            }

            $ekskul->update($data);

            return redirect()->route('ekstrakurikuler.index')->with('success', 'Data berhasil diperbarui.');
        }

        return redirect()->route('ekstrakurikuler.index')->with('error', 'Data tidak ditemukan.');
    }

    public function destroy(Request $request)
    {
        $ekskul = ekstrakulikuler::where('id_eskul', $request->id_eskul)->first();

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