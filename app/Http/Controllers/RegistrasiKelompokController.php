<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\Classes;
use App\Models\Distance;
use App\Models\Payments;
use App\Models\Province;
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
use Illuminate\Support\Facades\Storage;
use App\Models\Participant_registrations;
use Illuminate\Support\Facades\Validator;

class RegistrasiKelompokController extends Controller
{
    public function editKelompok($id, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $participant = Participants::find($id);
        $provinsi = Province::orderBy('name', 'asc')->get();
        $pageTitle = 'Edit Partisipan';
        return view('Resources.kelompok.form-editregistrasi-kelompok', compact('provinsi', 'participant', 'event', 'pageTitle'));
    }
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
            'file_raport' => 'nullable|mimes:pdf,jpg,jpeg|max:5120',
            'file_akte' => 'nullable|mimes:pdf,jpg,jpeg|max:5120',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $year = $request->year;
        $day = $request->date;
        $month = $request->month;
        $participant = Participants::find($id);
        if (!$participant) {
            return redirect()->back()->with('error', 'Participant not found.');
        }
        if ($request->hasFile('file_raport')) {
            $raportPath = $request->file('file_raport')->store('kelompok/raports', 'public');
            $participant->file_raport = $raportPath;
        }
        if ($request->hasFile('file_akte')) {
            $aktePath = $request->file('file_akte')->store('kelompok/akte', 'public');
            $participant->file_akte =  $aktePath;
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
        $participant->save();
        return redirect()->route('kelompok.detail', ['slug' => $event->slug]);
    }

    public function pilihKelas($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $participantData = Session::get('form_kelompok');
        $dateOfBirth = $participantData['date_of_birth'] ?? null;
        // dd($dateOfBirth);
        if ($dateOfBirth) {
            $age = \Carbon\Carbon::parse($dateOfBirth)->age;
            // dd($age);
            $kelas = Category_events::with('categoryClass.classes')
                ->where('event_id', $eventId->id)
                ->get()
                ->filter(function ($event) use ($age) {
                    $className = $event->categoryClass->classes->class_name;
                    if ($age >= 4 && $age <= 6) {
                        return strpos($className, '6 TAHUN KE BAWAH') !== false;
                    }
                    if (strpos($className, 'TAHUN') !== false) {
                        preg_match('/(\d+)\s*TAHUN/', $className, $matches);

                        if (isset($matches[1])) {
                            $maxAge = (int)$matches[1];

                            if (strpos($className, '-') !== false) {
                                preg_match('/(\d+)\s*-\s*(\d+)\s*TAHUN/', $className, $rangeMatches);
                                if (isset($rangeMatches[1]) && isset($rangeMatches[2])) {
                                    $minAge = (int)$rangeMatches[1];
                                    $maxAge = (int)$rangeMatches[2];
                                    return $age >= $minAge && $age <= $maxAge;
                                }
                            }

                            return $age <= $maxAge;
                        }
                    }
                    return false;
                })
                ->unique('categoryClass.classes.class_name');
        } else {
            $kelas = collect();
        }
        $category = Category_events::with('categoryClass.category')->where('event_id', $eventId->id)->get()->unique('categoryClass.category.category_name');
        $jarak = Category_events::with('categoryClass')
            ->where('event_id', $eventId->id)
            ->get()
            ->pluck('categoryClass.jarak')
            ->unique();
        $pageTitle = 'Pilih Kelas';
        return view('Resources.kelompok.pilih-kelas', compact('event', 'kelas', 'jarak', 'category', 'pageTitle'));
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
            'jarak.*' => 'required|string',
            'minutes.*' => 'nullable|numeric|min:0|max:59',
            'seconds.*' => 'nullable|numeric|min:0|max:59',
            'milliseconds.*' => 'nullable|numeric|min:0|max:999',
            'price.*' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $participantData = Session::get('form_kelompok', []);
        $participant = Participants::create($participantData);
        $extitingRegister = Registrations::where('user_id', Auth::id())
            ->where('event_id', $eventId->id)->where('type', 'Kelompok')->whereIn('status', ['Pending', 'Draft'])
            ->first();
        if ($extitingRegister) {
            $registration = $extitingRegister;
        } else {
            $registration = Registrations::create([
                'user_id' => Auth::id(),
                'event_id' => $eventId->id,
                'no_registration' => strtoupper(bin2hex(random_bytes(5))),
                'type' => 'Kelompok',
                'status' => 'Draft',
            ]);
        }
        $participantRegistration = Participant_registrations::create([
            'registration_id' => $registration->id,
            'participan_id'   => $participant->id,
        ]);
        $class = $request->category_event_id;
        foreach ($request->no_participant as $index => $noParticipant) {
            $noRenang = strtoupper(bin2hex(random_bytes(3)));
            $lastRecord = $request->last_record[$index] ?? null;
            $jarak = $request->jarak[$index];
            $priceDistance = Distance::where('jarak', $jarak)->first();
            $participanCetgory = Participant_categories::create([
                'participant_registration_id' => $participantRegistration->id,
                'category_event_id' => $class,
                'no_participant' => $noParticipant,
                'price' => $priceDistance->price,
                'record' => null,
                'last_record' => $lastRecord ?? null,
                'jarak' => $jarak,
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
        $pageTitle = 'Partisipan Detail';
        return view('Resources.kelompok.detail-registrasi-kelompok', compact('event', 'reg', 'category', 'record', 'kelas', 'pageTitle'));
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
        $regist = Registrations::where('user_id', Auth::id())->where('type', 'Kelompok')->where('event_id', $eventId->id)->whereIn('status', ['Pending', 'Draft'])->first();
        $participanRegist = Participant_registrations::where('registration_id', $regist->id)->pluck('participan_id')->toArray();
        $peserta = Participants::whereIn('id', $participanRegist)->get();
        $pageTitle = 'Registrasi Detail';
        return view('Resources.kelompok.register-list', compact('event', 'peserta', 'pageTitle'));
    }
    public function checkoutProccess(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();

        if (!$event) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        // $maintenanceMode = true;

        // if ($maintenanceMode) {
        //     return redirect()->back()->with('error', 'Halaman ini sedang dalam tahap pemeliharaan. Silakan coba lagi nanti.');
        // }
        $user = Auth::user();
        $registrasi = Registrations::where('user_id', Auth::id())->where('type', 'Kelompok')->where('event_id', $eventId->id)->whereIn('status', ['Draft', 'Pending'])->first();
        $registrasi->status = "Pending";
        $registrasi->save();
        $participanRegistration = Participant_registrations::where('registration_id', $registrasi->id)->get();
        $peserta = Participants::whereIn('id', $participanRegistration->pluck('participan_id'))->get();

        $participantCategories = collect();

        foreach ($participanRegistration as $registration) {
            $categories = Participant_categories::where('participant_registration_id', $registration->id)->get();
            $participantCategories = $participantCategories->merge($categories);
        }
        $kelas = $participantCategories->count();
        $price = $participantCategories->sum('price');
        $nomor = $peserta->count();
        // $total = $price * $kelas;
        $admin = 5000;
        $tax = $price * 0.02;
        $grand = $price + $admin + $tax;
        $existingCheckout = Payments::where('registration_id', $registrasi->id)->first();
        if ($existingCheckout) {
            $checkout = $existingCheckout;
        } else {
            $checkout = Payments::create([
                'registration_id' => $registrasi->id,
                'payment_method' => 1,
                'sub_total' => $price,
                'fee' => $price,
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
        $pageTitle = 'Checkout Prosses';
        return view('Resources.kelompok.rincian-pembayaran', compact('checkout', 'event', 'admin', 'kelas', 'nomor', 'price', 'grand', 'pageTitle', 'participantCategories'));
    }

    public function remove($id, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        if (!$eventId) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        $event = Category_events::where('event_id', $eventId->id)->first();

        if (!$event) {
            return redirect()->back()->with('error', 'Kategori event tidak ditemukan.');
        }
        $participant = Participants::find($id);
        $participant->delete();
        return redirect()->route('kelompok.listdetail', ['slug' => $eventId->slug])->with('success', 'Peserta berhasil dihapus.');
    }
}
