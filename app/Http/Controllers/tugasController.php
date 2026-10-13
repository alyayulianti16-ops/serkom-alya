<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tugasController extends Controller
{
    public function index()
    {
        return view('tugas');
    }

    public function tugas(Request $request)
    {
        $nilai1 = $request->input('nilai1');
        $nilai2 = $request->input('nilai2');
        $nilairatarata = ($nilai1 + $nilai2) / 2;

        if ($nilairatarata < 75) {
            $status = 'Tidak Lulus';
        } else {
            $status = 'Lulus';
        }

        return view('tugas', compact('nilairatarata', 'status'));
    }
}
