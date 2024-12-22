<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Participant_registrations;
use Illuminate\Support\Facades\Validator;

class RegistrasiKelompokController extends Controller
{
    public function post(Request $request, $slug)
    {


        $event = Events::where('slug', $slug)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $categoryEvent = Category_events::where('event_id', $event->id)->first();
        if (!$categoryEvent) {
            return redirect()->back()->with('error', 'Category event not found.');
        }
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
            'file_raport' => 'required|max:5120',
            'file_akte' => 'required|max:5120',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $year = $request->year;
        $month = $request->month;
        $day = $request->date;
        $raportPath = $request->file('file_raport')->store('kelompok/raports', 'public');
        $aktePath = $request->file('file_akte')->store('kelompok/akte', 'public');
        try {
            $register = Participants::create([
                'user_id' => Auth::user()->id,
                'participant_name' => $request->participant_name,
                'gender' => $request->gender,
                'date_of_birth' => sprintf('%04d-%02d-%02d', $year, $month, $day),
                'address' => $request->address,
                'province' => $request->province,
                'city' => $request->city,
                'district' => $request->district,
                'zip_code' => $request->zip_code,
                'school' => $request->school,
                'email' => $request->email,
                'file_raport' => $raportPath,
                'file_akte' => $aktePath,
            ]);
            $registration = Registrations::create([
                'user_id' => Auth::user()->id,
                'event_id' => $event->id,
                'no_registration' => strtoupper(bin2hex(random_bytes(5))),
                'type' => 'Kelompok',
                'status' => 'Pending',
            ]);

            $participantRegistration = Participant_registrations::create([
                'registration_id' => $registration->id,
                'participan_id' => $register->id,
            ]);
            Session::put('participant_registration_id', $participantRegistration->id);
            return redirect()->route('kelompok.detail', ['slug' => $event->slug, 'id' => $register->id])->with('success', 'Registrasi berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registrasi gagal');
        }
    }

    public function regisDetail($id, $slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $reg = Participants::where('id', $id)->first();
        return view('Resources.kelompok.detail-registrasi-kelompok', compact('event', 'reg'));
    }

    public function listDetail($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        return view('Resources.kelompok.register-list', compact('event'));
    }
}
