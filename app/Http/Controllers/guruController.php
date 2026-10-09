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

        $data['gurus'] = Guru::when($search, function ($query, $search) {
            return $query->where('nama_guru', 'like', "%{$search}%")
                ->orWhere('nip', 'like', "%{$search}%")
                ->orWhere('mapel', 'like', "%{$search}%");
        })
            ->orderBy('nama_guru', 'asc')
            ->get();

        return view('guru.index', $data);
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'required|numeric|max_digits:18|unique:gurus,nip',
            'mapel'     => 'required|string|max:40',
            'foto'      => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nip.numeric'    => 'NIP harus berupa angka.',
            'nip.max_digits' => 'NIP tidak boleh lebih dari 18 digit.',
            'nip.unique'     => 'NIP sudah terdaftar.',
        ]);

        $fotoPath = $request->file('foto')->store('guru', 'public');

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $fotoPath,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id_guru') ?? $request->query('id');

        if ($id) {
            $idDecrypted = decrypt($id);
            $guru = Guru::find($idDecrypted);

            if ($guru) {
                return view('guru.edit', compact('guru'));
            }
        }

        return redirect()->route('guru.index')->with('error', 'Data Not Found');
    }

    public function update(Request $request)
    {
        $id = decrypt($request->id_guru);
        $guru = Guru::find($id);

        if (!$guru) {
            return redirect()->route('guru.index')->with('error', 'Data Not Found');
        }

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => 'required|numeric|max_digits:18|unique:gurus,nip' . $id . ',id_guru',
            'mapel'     => 'required|string|max:40',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nip.numeric'        => 'NIP harus berupa angka.',
            'nip.max_digits' => 'NIP tidak boleh lebih dari 18 digit.',
            'nip.unique'         => 'NIP sudah terdaftar.',
        ]);
        $updateData = [
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
        ];
        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $updateData['foto'] = $request->file('foto')->store('guru', 'public');
        }
        $guru->update($updateData);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $id = decrypt($request->id_guru);
        $guru = Guru::find($id);

        if ($guru) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $guru->delete();
            return redirect()->route('guru.index')->with('success', 'Data berhasil di hapus!');
        }

        return redirect()->route('guru.index')->with('error', 'Data Not Found');
    }
}
