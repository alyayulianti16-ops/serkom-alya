<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tugasController extends Controller
{
    public function index(){
        return view('tugas');
    }

    public function tugas(Request $request){
        $nilairatarata = ('nilai1' + 'nilai2' / 2);
        if($nilairatarata){
            $nilairatarata = 70;
        }else{
            $nilairatarata = 100;
        }
    }
}
