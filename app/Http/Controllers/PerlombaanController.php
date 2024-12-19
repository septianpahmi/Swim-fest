<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerlombaanController extends Controller
{
    public function index()
    {
        return view('Resources.tournament');
    }

    public function detail()
    {
        return view('Resources.detail-tournament');
    }
}
