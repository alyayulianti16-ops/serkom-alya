<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $siswas = Siswa::when($search, function ($query, $search) {
            return $query->where('nama_siswa', 'like', "%{$search}%")
                         ->orWhere('nisn', 'like', "%{$search}%");
        })
        ->orderBy('nama_siswa','asc')
        ->get();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn'         => 'required|numeric|max_digits:10|unique:siswas,nisn',
            'nama_siswa'   => 'required|string|max:40',
            'jens_kelamin' => 'required|in:laki-laki,perempuan',
            'tahun_masuk'  => 'required|digits:4',
        ], [
            'nisn.numeric'    => 'NISN harus berupa angka.',
            'nisn.max_digits' => 'NISN tidak boleh lebih dari 10 digit.',
            'nisn.unique'     => 'NISN sudah terdaftar.',
        ]);

        Siswa::create([
            'nisn'         => $request->nisn,
            'nama_siswa'   => $request->nama_siswa,
            'jens_kelamin' => $request->jens_kelamin,
            'tahun_masuk'  => $request->tahun_masuk,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nisn'         => 'required|numeric|max_digits:10|unique:siswas,nisn,' . $id . ',id_siswa',
            'nama_siswa'   => 'required|string|max:40',
            'jens_kelamin' => 'required|in:laki-laki,perempuan',
            'tahun_masuk'  => 'required|digits:4',
        ], [
            'nisn.numeric'    => 'NISN harus berupa angka.',
            'nisn.max_digits' => 'NISN tidak boleh lebih dari 10 digit.',
            'nisn.unique'     => 'NISN sudah terdaftar.',
        ]);

        $siswa->update([
            'nisn'         => $request->nisn,
            'nama_siswa'   => $request->nama_siswa,
            'jens_kelamin' => $request->jens_kelamin,
            'tahun_masuk'  => $request->tahun_masuk,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
