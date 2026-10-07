<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data['siswas'] = Siswa::when($search, function ($query, $search) {
            return $query->where('nama_siswa', 'like', "%{$search}%")
                         ->orWhere('nisn', 'like', "%{$search}%")
                         ->orWhere('jens_kelamin', 'like', "%{$search}%");
        })
        ->orderBy('nama_siswa', 'asc')
        ->get();

        return view('siswa.index', $data);
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

    public function edit(Request $request)
    {
        $id = $request->query('id_siswa') ?? $request->query('id');

        if ($id) {
            $idDecrypted = decrypt($id);
            $siswa = Siswa::find($idDecrypted);

            if ($siswa) {
                return view('siswa.edit', compact('siswa'));
            }
        }

        return redirect()->route('siswa.index')->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request)
    {
        $id = decrypt($request->id_siswa);
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'Data tidak ditemukan.');
        }

        $request->validate([
            'nisn'         => 'required|numeric|max_digits:10|unique:siswas,nisn,' . $id . ',id_siswa',
            'nama_siswa'   => 'required|string|max:40',
            'jens_kelamin' => 'required',
            'tahun_masuk'  => 'required|digits:4',
        ]);

        $siswa->update([
            'nisn'         => $request->nisn,
            'nama_siswa'   => $request->nama_siswa,
            'jens_kelamin' => $request->jens_kelamin,
            'tahun_masuk'  => $request->tahun_masuk,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $id = decrypt($request->id_siswa);
        $siswa = Siswa::find($id);

        if ($siswa) {
            $siswa->delete();
            return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('siswa.index')->with('error', 'Data tidak ditemukan.');
    }
}
