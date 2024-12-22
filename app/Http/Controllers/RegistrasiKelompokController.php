<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Payments;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\participant_categories;
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
            return redirect()->route('kelompok.pilihKelas', ['slug' => $event->slug])->with('success', 'Registrasi berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Registrasi gagal');
        }
    }

    public function pilihKelas($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        return view('Resources.kelompok.pilih-kelas', compact('event'));
    }

    public function postKelas(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $participantRegistrationId = Session::get('participant_registration_id');
        if (!$participantRegistrationId) {
            return redirect()->back()->with('error', 'Data registrasi peserta tidak ditemukan.');
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
            $participanCetgory = participant_categories::create([
                'participant_registration_id' => $participantRegistrationId,
                'category_event_id' => $event->id,
                'no_participant' => $noParticipant,
                'price' => $event->price ?? null,
                'record' => null,
                'last_record' => $request->last_record[$index] ?? null,
            ]);
        }
        Session::put('category_event_id', $participanCetgory->id);
        return redirect()->route('kelompok.detail', $slug)->with('success', 'Berhasil menambah Kelas');
    }

    public function regisDetail($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $participantRegistrationId = Session::get('participant_registration_id');
        $reg = Participant_registrations::where('id', $participantRegistrationId)->first();
        return view('Resources.kelompok.detail-registrasi-kelompok', compact('event', 'reg'));
    }

    public function listDetail($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $user = Auth::id();
        $regist = Registrations::where('user_id', $user)
            ->where('status', 'Pending')
            ->where('event_id', $eventId)
            ->select('id');
        $listparticipan = Participant_registrations::whereIn('registration_id', $regist)
            ->pluck('participan_id');
        $list = Participants::whereIn('id', $listparticipan)->get();
        return view('Resources.kelompok.register-list', compact('event', 'list'));
    }
    public function checkoutProccess($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        $user = Auth::user();
        $registrationId = Registrations::where('user_id', $user->id)->value('id');
        $participantRegistrationId = Session::get('participant_registration_id');
        if (!$participantRegistrationId) {
            return redirect()->route('home')->with('error', 'Data registrasi peserta tidak ditemukan.');
        }

        $participantCategories = Participant_categories::where('participant_registration_id', $participantRegistrationId)->get();
        $reg = Participant_registrations::where('id', $participantRegistrationId)->count('participan_id');
        $nomor = $participantCategories->count();
        $price = $participantCategories->sum('price');

        $total = $nomor > 0 ? $price * $nomor : 0;
        $grand = $total;
        $checkout = Payments::create([
            'registration_id' => $registrationId,
            'payment_method' => 1,
            'sub_total' => $price,
            'fee' => $total,
            'diskon' => 0,
            'grand_total' => $grand,
            // 'paid_at' => Carbon,
        ]);
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $grand,
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'email' => $user->email,
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $checkout->reff_id = $snapToken;
        $checkout->save();
        // return redirect()->route('kelompok.checkout', $checkout->id);
        return view('Resources.kelompok.rincian-pembayaran', compact('checkout', 'event', 'nomor', 'price', 'total', 'grand'));
    }
    public function remove($id)
    {
        $data = Participants::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Peserta berhasil dihapus.');
    }
}
