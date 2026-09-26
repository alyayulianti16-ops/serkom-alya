<?php

namespace App\Http\Controllers;

use App\Models\profile_sekolah;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profil = profile_sekolah::first();
        return view('profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = profile_sekolah::first() ?? new profile_sekolah();
        return view('profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required|string|max:40',
            'kepala_sekolah' => 'required|string|max:40',
            'npsn'           => 'required|numeric|max_digits:10',
            'kontak'         => 'required|numeric|max_digits:15',
            'tahun_berdiri'  => 'required|numeric|min:1901|max:' . date('Y'),
            'alamat'         => 'required',
            'visi_misi'      => 'required',
            'deskripsi'      => 'required',
            'logo'           => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ], [
            'npsn.numeric'     => 'NPSN harus berupa angka.',
            'npsn.max_digits'  => 'NPSN tidak boleh lebih dari 10 digit.',
            'kontak.numeric'   => 'Kontak / No Telp harus berupa angka.',
            'kontak.max_digits'=> 'Kontak / No Telp tidak boleh lebih dari 15 digit.',
        ]);

        $data = $request->only([
            'nama_sekolah', 'kepala_sekolah', 'npsn',
            'kontak', 'tahun_berdiri', 'alamat', 'visi_misi', 'deskripsi'
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('profil', 'public');
            $data['logo'] = basename($logoPath);
        }

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('profil', 'public');
            $data['foto'] = basename($fotoPath);
        }

        $profil = profile_sekolah::first();

        if ($profil) {
            $profil->update($data);
        } else {
            profile_sekolah::create($data);
        }

        return redirect()->route('profile_sekolah.index')->with('success', 'Profil Sekolah berhasil diperbarui!');
    }
}
