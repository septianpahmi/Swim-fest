<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Classes;
use App\Models\Payments;
use App\Models\Categories;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Category_classes;
use Illuminate\Support\Facades\Auth;
use App\Models\participant_categories;
use App\Models\Participant_registrations;

class PerlombaanController extends Controller
{
    public function index()
    {
        $event = Category_events::where('event_id', 1)->get()->unique('event_id');
        $eventId = Events::where('id', 1)->first();
        $categoryEvent = Category_events::where('event_id', $eventId->id)->pluck('category_class_id')->toArray();
        $categoryClass = Category_classes::whereIn('id', $categoryEvent)->get();
        $pageTitle = 'Perlombaan';
        return view('Resources.tournament', compact('event', 'categoryClass', 'pageTitle'));
    }

    public function detail($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $categoryEvent = Category_events::where('event_id', $eventId->id)->pluck('category_class_id')->toArray();
        $categoryClass = Category_classes::whereIn('id', $categoryEvent)->get();
        $pageTitle = 'Detail Perlombaan';
        return view('Resources.detail-tournament', compact('event', 'categoryClass', 'pageTitle'));
    }

    public function detailLomba($id, $regis, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();

        $categoryEvent = Category_events::where('event_id', $eventId->id)->pluck('category_class_id')->toArray();
        $categoryClass = Category_classes::whereIn('id', $categoryEvent)->get();

        $regisData = Registrations::where('user_id', $id)
            ->where('no_registration', $regis)
            ->first();
        $regisId = Participant_registrations::where('registration_id', $regisData->id)->pluck('id')->toArray();
        $parCat = participant_categories::whereIn('participant_registration_id', $regisId)->get();


        $kelasData = participant_categories::whereIn('participant_registration_id', $regisId)->pluck('category_event_id')->toArray();
        $kelas = Classes::where('id', $kelasData)->get();
        $categoryData = participant_categories::whereIn('participant_registration_id', $regisId)->pluck('no_participant')->toArray();
        $category = Categories::where('id', $categoryData)->get();
        $checkout = Payments::where('registration_id', $regisData->id)->first();
        return view('Resources.participant.detail-lomba', compact('event', 'checkout', 'parCat', 'categoryClass', 'kelas', 'category', 'regisData'));
    }

    public function facturDownload($id, $regis, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();

        $categoryEvent = Category_events::where('event_id', $eventId->id)->pluck('category_class_id')->toArray();
        $categoryClass = Category_classes::whereIn('id', $categoryEvent)->get();
        $regisData = Registrations::where('user_id', $id)
            ->where('no_registration', $regis)
            ->first();
        $regisId = Participant_registrations::where('registration_id', $regisData->id)->pluck('id')->toArray();
        $parCat = participant_categories::whereIn('participant_registration_id', $regisId)->get();


        $kelasData = participant_categories::whereIn('participant_registration_id', $regisId)->pluck('category_event_id')->toArray();
        $kelas = Classes::where('id', $kelasData)->get();
        $categoryData = participant_categories::whereIn('participant_registration_id', $regisId)->pluck('no_participant')->toArray();
        $category = Categories::where('id', $categoryData)->get();
        $checkout = Payments::where('registration_id', $regisData->id)->first();
        $pdf = Pdf::loadView('Layouts.faktur', compact('event', 'checkout', 'parCat', 'categoryClass', 'kelas', 'category', 'regisData'));

        return $pdf->download('faktur-pembayaran.pdf');
    }
}
