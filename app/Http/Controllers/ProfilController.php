<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('resources.profil.main');
    }

    public function pertandingan()
    {
        return view('resources.profil.pertandingan');
    }

    public function keamanan()
    {
        return view('resources.profil.keamanan');
    }
}
