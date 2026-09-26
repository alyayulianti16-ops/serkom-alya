<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $gurus = Guru::when($search, function ($query, $search) {
            return $query->where('nama_guru', 'like', "%{$search}%")
                         ->orWhere('nip', 'like', "%{$search}%")
                         ->orWhere('mapel', 'like', "%{$search}%");
        })
        ->orderBy('nama_guru', 'asc')
        ->get();

        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'required|numeric|max_digits:15|unique:gurus,nip',
            'mapel'     => 'required|string|max:40',
            'foto'      => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nip.numeric'    => 'NIP harus berupa angka.',
            'nip.max_digits' => 'NIP tidak boleh lebih dari 15 digit.',
            'nip.unique'     => 'NIP sudah terdaftar.',
        ]);

        // Upload foto
        $fotoPath = $request->file('foto')->store('guru', 'public');

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $fotoPath,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'required|numeric|max_digits:15|unique:gurus,nip,' . $id . ',id_guru',
            'mapel'     => 'required|string|max:40',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nip.numeric'    => 'NIP harus berupa angka.',
            'nip.max_digits' => 'NIP tidak boleh lebih dari 15 digit.',
            'nip.unique'     => 'NIP sudah terdaftar.',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
        ];

        // Jika user mengunggah foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus foto dari storage
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
