<?php

namespace App\Http\Controllers;

use App\Models\Category_events;
use App\Models\Events;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $event = Category_events::where('id', 1)->get();
        $pageTitle = 'Beranda';
        return view('Resources.beranda', compact('event', 'pageTitle'));
    }
}
