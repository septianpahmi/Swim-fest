<?php

namespace App\Http\Controllers;

use App\Models\Category_events;
use App\Models\Events;
use Illuminate\Http\Request;

class PerlombaanController extends Controller
{
    public function index()
    {
        $event = Category_events::all();
        return view('Resources.tournament', compact('event'));
    }

    public function detail($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        return view('Resources.detail-tournament', compact('event'));
    }
}
