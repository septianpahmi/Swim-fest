<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\Classes;
use App\Models\Payments;
use App\Models\Categories;
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

        $data = [
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
        Session::put('form_kelompok', $data);
        return redirect()->route('kelompok.pilihKelas', ['slug' => $event->slug]);
    }
    public function editPesertaPost(Request $request, $id, $slug)
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
            'file_raport' => 'required|mimes:pdf,jpg,jpeg|max:5120',
            'file_akte' => 'required|mimes:pdf,jpg,jpeg|max:5120',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $year = $request->year;
        $day = $request->date;
        $month = $request->month;

        $raportPath = $request->file('file_raport')->store('kelompok/raports', 'public');
        $aktePath = $request->file('file_akte')->store('kelompok/akte', 'public');

        $participant = Participants::find($id);
        if (!$participant) {
            return redirect()->back()->with('error', 'Participant not found.');
        }
        $participant->user_id = Auth::user()->id;
        $participant->participant_name = $request->participant_name;
        $participant->gender = $request->gender;
        $participant->date_of_birth = sprintf('%04d-%02d-%02d', $year, $month, $day);
        $participant->address = $request->address;
        $participant->province = $request->province;
        $participant->city = $request->city;
        $participant->district = $request->district;
        $participant->zip_code = $request->zip_code;
        $participant->school = $request->school;
        $participant->email = $request->email;
        $participant->file_raport = $raportPath;
        $participant->file_akte = $aktePath;
        $participant->save();
        return redirect()->route('kelompok.detail', ['slug' => $event->slug]);
    }

    public function pilihKelas($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $kelas = Category_events::with('categoryClass.classes')->where('event_id', $eventId->id)->get()->unique('categoryClass.classes.class_name');
        $category = Category_events::with('categoryClass.category')->where('event_id', $eventId->id)->get()->unique('categoryClass.category.category_name');;
        return view('Resources.kelompok.pilih-kelas', compact('event', 'kelas', 'category'));
    }
    // public function newKelas($slug)
    // {
    //     $eventId = Events::where('slug', $slug)->first();
    //     $event = Category_events::where('event_id', $eventId->id)->first();
    //     return view('Resources.kelompok.new-kelas', compact('event'));
    // }

    public function postKelas(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $validator = Validator::make($request->all(), [
            'no_participant.*' => 'required|numeric',
            'last_record.*' => 'nullable|numeric',
            'price.*' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $participantData = Session::get('form_kelompok', []);
        $participant = Participants::create($participantData);
        $extitingRegister = Registrations::where('user_id', Auth::id())
            ->where('event_id', $event->id)->where('type', 'Kelompok')
            ->first();
        if ($extitingRegister) {
            $registration = $extitingRegister;
        } else {
            $registration = Registrations::create([
                'user_id' => Auth::id(),
                'event_id' => $eventId->id,
                'no_registration' => strtoupper(bin2hex(random_bytes(5))),
                'type' => 'Kelompok',
                'status' => 'Pending',
            ]);
        }
        $participantRegistration = Participant_registrations::create([
            'registration_id' => $registration->id,
            'participan_id'   => $participant->id,
        ]);
        $class = $request->category_event_id;
        foreach ($request->no_participant as $index => $noParticipant) {
            $noRenang = strtoupper(bin2hex(random_bytes(6)));
            $participanCetgory = Participant_categories::create([
                'participant_registration_id' => $participantRegistration->id,
                'category_event_id' => $class,
                'no_participant' => $noParticipant,
                'price' => $event->price ?? null,
                'record' => null,
                'last_record' => $request->last_record[$index] ?? null,
                'no_renang' => $noRenang,
            ]);
        }
        Session::put('registration', $registration);
        Session::put('participant_registration', $participantRegistration);
        Session::put('category_event_id', $participanCetgory);
        return redirect()->route('kelompok.detail', $slug);
    }

    // public function postnewKelas(Request $request, $slug)
    // {
    //     $eventId = Events::where('slug', $slug)->first();
    //     $event = Category_events::where('event_id', $eventId->id)->first();
    //     $validator = Validator::make($request->all(), [
    //         'no_participant.*' => 'required|numeric',
    //         'last_record.*' => 'nullable|numeric',
    //         'price.*' => 'nullable|numeric',
    //     ]);
    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }
    //     $participanCetgory = Session::get('category_event_id', []);
    //     foreach ($request->no_participant as $index => $noParticipant) {
    //         $newparticipanCetgory = [
    //             'participant_registration_id' => 1,
    //             'category_event_id' => $event->id,
    //             'no_participant' => $noParticipant,
    //             'price' => $event->price ?? null,
    //             'record' => null,
    //             'last_record' => $request->last_record[$index] ?? null,
    //         ];
    //     }
    //     $participanCetgory[] = $newparticipanCetgory;

    //     Session::put('category_event_id', $participanCetgory);
    //     return redirect()->route('kelompok.detail', $slug)->with('success', 'Berhasil menambah Kelas');
    // }

    public function regisDetail($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $reg = Participants::where('user_id', Auth::id())->latest()->first();
        $registration = Participant_registrations::where('participan_id', $reg->id)->first();
        $categories = Participant_categories::where('participant_registration_id',  $registration->id)->pluck('no_participant')->toArray();
        $category = Categories::whereIn('id', $categories)->get();
        $kelasEvent = Participant_categories::where('participant_registration_id',  $registration->id)->pluck('category_event_id')->toArray();
        $kelas = Classes::whereIn('id', $kelasEvent)->get();
        $record = Participant_categories::where('participant_registration_id',  $registration->id)->get();
        return view('Resources.kelompok.detail-registrasi-kelompok', compact('event', 'reg', 'category', 'record', 'kelas'));
    }

    public function listDetail($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        if (!$eventId) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        $event = Category_events::where('event_id', $eventId->id)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        $regist = Registrations::where('user_id', Auth::id())->where('type', 'Kelompok')->where('event_id', $eventId->id)->where('status', 'Pending')->first();
        $participanRegist = Participant_registrations::where('registration_id', $regist->id)->pluck('participan_id')->toArray();
        $peserta = Participants::whereIn('id', $participanRegist)->get();
        return view('Resources.kelompok.register-list', compact('event', 'peserta'));
    }
    public function checkoutProccess(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();

        if (!$event) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        $user = Auth::user();
        $registrasi = Registrations::where('user_id', Auth::id())->where('type', 'Kelompok')->where('event_id', $eventId->id)->where('status', 'Pending')->first();
        $participanRegistration = Participant_registrations::where('registration_id', $registrasi->id)->get();
        $peserta = Participants::whereIn('id', $participanRegistration->pluck('participan_id'))->get();

        $participantCategories = collect();

        foreach ($participanRegistration as $registration) {
            $categories = Participant_categories::where('participant_registration_id', $registration->id)->get();
            $participantCategories = $participantCategories->merge($categories);
        }
        $kelas = $participantCategories->count();
        $price = $kelas > 0 ? $participantCategories->sum('price') / $kelas : 0;
        $nomor = $peserta->count();
        $total = $price * $kelas;
        $admin = 5000;
        $tax = $total * 0.02;
        $grand = $total + $admin + $tax;
        $existingCheckout = Payments::where('registration_id', $registrasi->id)->first();
        if ($existingCheckout) {
            $checkout = $existingCheckout;
        } else {
            $checkout = Payments::create([
                'registration_id' => $registrasi->id,
                'payment_method' => 1,
                'sub_total' => $price,
                'fee' => $total,
                'diskon' => 0,
                'grand_total' => $grand,
            ]);

            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
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
        }
        Session::put('checkout', $checkout);
        return view('Resources.kelompok.rincian-pembayaran', compact('checkout', 'event', 'admin', 'kelas', 'nomor', 'price', 'total', 'grand'));
    }

    public function remove($id, $slug)
    {
        $event = Events::where('slug', $slug)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        $categoryEvent = Category_events::where('event_id', $event->id)->first();

        if (!$categoryEvent) {
            return redirect()->back()->with('error', 'Kategori event tidak ditemukan.');
        }
        $participant = Participants::find($id);
        $participant->delete();
        return redirect()->route('kelompok.listdetail', ['slug' => $categoryEvent])->with('success', 'Peserta berhasil dihapus.');
    }
}
