<?php

namespace App\Http\Controllers;

use App\Models\Category_classes;
use App\Models\Category_events;
use App\Models\Events;
use Illuminate\Http\Request;

class PerlombaanController extends Controller
{
    public function index()
    {
        $event = Category_events::where('event_id', 1)->get()->unique('event_id');
        return view('Resources.tournament', compact('event'));
    }

    public function detail($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $categoryEvent = Category_events::where('event_id', $eventId->id)->pluck('category_class_id')->toArray();
        $categoryClass = Category_classes::whereIn('id', $categoryEvent)->get();
        return view('Resources.detail-tournament', compact('event', 'categoryClass'));
    }
}
