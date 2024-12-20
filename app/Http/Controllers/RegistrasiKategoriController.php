<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\Category_events;
use App\Http\Controllers\Controller;

class RegistrasiKategoriController extends Controller
{
    public function index($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        return view('Resources.registrasi', compact('event'));
    }

    public function mandiri($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        return view('Resources.form-registrasi-mandiri', compact('event'));
    }
    public function kelompok()
    {
        return view('Resources.form-registrasi-kelompok');
    }
}
