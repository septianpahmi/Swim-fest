<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\Payments;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use Psy\Readline\Hoa\Exception;
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
        $user = Auth::user();
        $year = $request->year;
        $month = $request->month;
        $day = $request->date;

        $raportPath = $request->file('file_raport')->store('kelompok/raports', 'public');
        $aktePath = $request->file('file_akte')->store('kelompok/akte', 'public');

        $data[] = [
            'user_id' => $user->id,
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
            'event_id' => $event->id,
        ];
        $registration[] = [
            'user_id' => Auth::user()->id,
            'event_id' => $event->id,
            'no_registration' => strtoupper(bin2hex(random_bytes(5))),
            'type' => 'Kelompok',
            'status' => 'Pending',
        ];

        Session::put('form_kelompok', $data);
        Session::put('registration', $registration);
        return redirect()->route('kelompok.pilihKelas', ['slug' => $event->slug]);
    }
    public function addPesertaPost(Request $request, $slug)
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
        $data = Session::get('form_kelompok', []);
        // dd($data);
        $year = $request->year;
        $month = $request->month;
        $day = $request->date;

        $raportPath = $request->file('file_raport')->store('kelompok/raports', 'public');
        $aktePath = $request->file('file_akte')->store('kelompok/akte', 'public');

        $newData = [
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
            'event_id' => $event->id,
        ];
        $registration = Session::get('registration', []);
        $newRegistration = [
            'user_id' => Auth::user()->id,
            'event_id' => $event->id,
            'no_registration' => strtoupper(bin2hex(random_bytes(5))),
            'type' => 'Kelompok',
            'status' => 'Pending',
        ];
        $data[] = $newData;
        $registration[] = $newRegistration;
        Session::put('form_kelompok', $data);
        Session::put('registration', $registration);
        return redirect()->route('kelompok.newKelas', ['slug' => $event->slug]);
    }

    public function pilihKelas($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        return view('Resources.kelompok.pilih-kelas', compact('event'));
    }
    public function newKelas($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        return view('Resources.kelompok.new-kelas', compact('event'));
    }

    public function postKelas(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $validator = Validator::make($request->all(), [
            'no_participant.*' => 'required|string',
            'last_record.*' => 'nullable|numeric',
            'price.*' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        foreach ($request->no_participant as $index => $noParticipant) {
            $participanCetgory[] = [
                'participant_registration_id' => 1,
                'category_event_id' => $event->id,
                'no_participant' => $noParticipant,
                'price' => $event->price ?? null,
                'record' => null,
                'last_record' => $request->last_record[$index] ?? null,
            ];
        }
        Session::put('category_event_id', $participanCetgory);
        return redirect()->route('kelompok.detail', $slug);
    }

    public function postnewKelas(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $validator = Validator::make($request->all(), [
            'no_participant.*' => 'required|string',
            'last_record.*' => 'nullable|numeric',
            'price.*' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $participanCetgory = Session::get('category_event_id', []);
        foreach ($request->no_participant as $index => $noParticipant) {
            $newparticipanCetgory = [
                'participant_registration_id' => 1,
                'category_event_id' => $event->id,
                'no_participant' => $noParticipant,
                'price' => $event->price ?? null,
                'record' => null,
                'last_record' => $request->last_record[$index] ?? null,
            ];
        }
        $participanCetgory[] = $newparticipanCetgory;
        Session::put('category_event_id', $participanCetgory);
        return redirect()->route('kelompok.detail', $slug)->with('success', 'Berhasil menambah Kelas');
    }

    public function regisDetail($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $reg = Session::get('form_kelompok', []);
        $kelas = Session::get('category_event_id');
        return view('Resources.kelompok.detail-registrasi-kelompok', compact('event', 'reg', 'kelas'));
    }

    public function listDetail($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $peserta = Session::get('form_kelompok', []);
        return view('Resources.kelompok.register-list', compact('event', 'peserta'));
    }
    public function checkoutProccess(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        $user = Auth::user();
        $participants = Session::get('form_kelompok');
        $registrations = Session::get('registration');
        $participantRegistrations = [];
        foreach ($participants as $index => $participantData) {
            $participant = Participants::where('email', $participantData['email'])->first();

            if (!$participant) {
                $participant = Participants::create($participantData);
            }
            if (isset($registrations[$index])) {
                $registrationData = $registrations[$index];
                $registration = Registrations::where('no_registration', $registrationData['no_registration'])->first();

                if (!$registration) {
                    // Jika tidak ada, buat data baru
                    $registration = Registrations::create($registrationData);
                } else {
                    // Jika sudah ada, lakukan update
                    $registration->update($registrationData);
                }
                $participantRegistration = Participant_registrations::create([
                    'registration_id' => $registration->id,
                    'participan_id'   => $participant->id,
                ]);

                $participantRegistrations[] = $participantRegistration;
            } else {
                throw new Exception("Registration data missing for participant index: $index");
            }
        }
        $classCategory = Session::get('category_event_id');
        $kelas = [];
        foreach ($classCategory as $index => $classCategoryData) {
            if (isset($participantRegistrations[$index])) {
                $classCategoryData['participant_registration_id'] = $participantRegistrations[$index]->id;
                $classCategoryData['category_event_id'] = $event->id;

                $kelas[] = participant_categories::create($classCategoryData);
            }
        }

        $nomor = count($participants);
        $price = array_reduce($kelas, function ($sum, $item) {
            return $sum + ($item->price ?? 0);
        }, 0);
        $total = $price;
        $grand = $total;

        $checkout = Payments::create([
            'registration_id' => $registration->id,
            'payment_method' => 1,
            'sub_total' => $price,
            'fee' => $total,
            'diskon' => 0,
            'grand_total' => $grand,
            'paid_at' => Carbon::now(),
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
        Session::put('checkout', $checkout);
        return view('Resources.kelompok.rincian-pembayaran', compact('checkout', 'event', 'nomor', 'price', 'total', 'grand'));
    }
    public function remove($participantName)
    {
        $peserta = Session::get('form_kelompok', []);

        $peserta = array_filter($peserta, function ($p) use ($participantName) {
            return $p['participant_name'] !== $participantName;
        });
        session(['peserta' => array_values($peserta)]);
        return redirect()->back()->with('success', 'Peserta berhasil dihapus.');
    }
}
