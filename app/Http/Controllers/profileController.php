<?php

namespace App\Http\Controllers;

use App\Models\profile_sekolah;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function index()
    {
        $profil = profile_sekolah::first();
        return view('profil.index', compact('profil'));
    }

    //
    public function edit()
    {
        $profil = profile_sekolah::first() ?? new profile_sekolah();
        return view('profil.edit', compact('profil'));
    }

    //
    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah'   => 'required|max:40',
            'kepala_sekolah' => 'required|max:40',
            'npsn'           => 'required|max:10',
            'kontak'         => 'required|max:15',
            'tahun_berdiri'  => 'required|numeric|min:1901|max:' . date('Y'),
            'alamat'         => 'required',
            'visi_misi'      => 'required',
            'deskripsi'      => 'required',
            'logo'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
