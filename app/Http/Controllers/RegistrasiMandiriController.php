<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use App\Models\participant_categories;
use App\Models\Participant_registrations;
use App\Models\Registrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegistrasiMandiriController extends Controller
{
    public function file($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        return view('Resources.file-registrasi-mandiri', compact('event'));
    }
    public function post(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'participant_name' => 'required|string|max:255',
            'gender' => 'required',
            'address' => 'required|string|max:150',
            'province' => 'required|string|max:30',
            'city' => 'required|string|max:30',
            'district' => 'required|string|max:30',
            'zip_code' => 'required|string|max:5',
            'school' => 'required|string|max:60',
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $event = Events::where('slug', $slug)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $categoryEvent = Category_events::where('event_id', $event->id)->first();
        if (!$categoryEvent) {
            return redirect()->back()->with('error', 'Category event not found.');
        }

        Session::put('participant_data', $request->all());
        return redirect('/registrasi-kategori/mandiri/file/' . $slug);
    }

    public function uploadFile(Request $request, $slug)
    {
        $participantData = Session::get('participant_data');
        if (!$participantData) {
            return redirect()->back()->with('error', 'Data peserta tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'file_raport' => 'required|file|mimes:pdf|max:5120',
            'file_akte' => 'required|file|mimes:pdf|max:5120',
        ]);

        // dd($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $year = $participantData['years'];
        $month = $participantData['month'];
        $date = $participantData['date'];
        $raportPath = $request->file('file_raport')->store('raports');
        $aktePath = $request->file('file_akte')->store('akte');

        $participantData['date_of_birth'] = sprintf('%04d-%02d-%02d', $year, $month, $date);
        $participantData['user_id'] = Auth::user()->id;
        $participantData['file_raport'] = $raportPath;
        $participantData['file_akte'] = $aktePath;

        $participant = Participants::create($participantData);
        Session::forget('participant_data');

        $event = Events::where('slug', $slug)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $categoryEvent = Category_events::where('event_id', $event->id)->first();
        if (!$categoryEvent) {
            return redirect()->back()->with('error', 'Category event not found.');
        }
        $registration = Registrations::create([
            'user_id' => Auth::user()->id,
            'event_id' => $event->id,
            'no_registration' => strtoupper(bin2hex(random_bytes(5))),
            'type' => 'mandiri',
            'status' => 'Pending',
        ]);

        $participantRegistration = Participant_registrations::create([
            'registration_id' => $registration->id,
            'participan_id' => $participant->id,
        ]);
        Session::put('participant_registration_id', $participantRegistration->id);
        return redirect('/registrasi-kategori/mandiri/pilih-kelas/' . $slug);
    }

    public function pilihKelas($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        return view('Resources.pilih-kelas', compact('event'));
    }

    public function postKelasMandiri(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $categoryEvent = Category_events::where('event_id', $eventId)->first();
        if (!$categoryEvent) {
            return redirect()->route('home')->with('error', 'Kategori event tidak ditemukan.');
        }
        $participantRegistrationId = Session::get('participant_registration_id');

        if (!$participantRegistrationId) {
            return redirect()->route('home')->with('error', 'Data registrasi peserta tidak ditemukan.');
        }
        $validator = Validator::make($request->all(), [
            'no_participant.*' => 'required|string',
            'last_record.*' => 'nullable|numeric',
            'price.*' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        foreach ($request->no_participant as $index => $noParticipant) {
            participant_categories::create([
                'participant_registration_id' => $participantRegistrationId,
                'category_event_id' => $categoryEvent->id,
                'no_participant' => $noParticipant,
                'price' => $categoryEvent->price ?? null,
                'record' => null,
                'last_record' => $request->last_record[$index] ?? null,
            ]);
        }
        return redirect('/registrasi-kategori/mandiri/ringkasan/' . $slug);
    }
}
