<?php

namespace App\Http\Controllers;

class SapaController extends Controller
{
    public function index()
    {
        $nama = 'M Raffi Asy Syauqi';

        return view('pages.sapa', [
            'nama' => $nama,
        ]);
    }
}
