<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiKategoriController extends Controller
{
    public function index()
    {
        return view('Resources.registrasi');
    }

    public function mandiri()
    {
        return view('Resources.form-registrasi-mandiri');
    }
    public function kelompok()
    {
        return view('Resources.form-registrasi-kelompok');
    }
}
