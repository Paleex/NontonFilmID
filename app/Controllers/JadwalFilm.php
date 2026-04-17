<?php

namespace App\Controllers;

class JadwalFilm extends BaseController
{
    public function index()
    {
        return view('jadwal'); // Memanggil view 'jadwal.php'
    }
}