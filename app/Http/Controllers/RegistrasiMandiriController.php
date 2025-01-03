<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\Payments;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use App\Models\Distance;
use Illuminate\Support\Facades\Auth;
use App\Models\participant_categories;
use Illuminate\Support\Facades\Session;
use App\Models\Participant_registrations;
use Illuminate\Support\Facades\Validator;

class RegistrasiMandiriController extends Controller
{
    public function file($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $pageTitle = 'Pilih File';
        return view('Resources.file-registrasi-mandiri', compact('event', 'pageTitle'));
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
        $user = Auth::user();
        $year = $request->year;
        $month = $request->month;
        $day = $request->date;

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
        ];
        Session::put('participant_data', $data);
        return redirect('/registrasi-kategori/mandiri/file/' . $slug);
    }

    public function uploadFile(Request $request, $slug)
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
            'file_raport' => 'required|mimes:pdf,jpg,jpeg||max:5120',
            'file_akte' => 'required|mimes:pdf,jpg,jpeg||max:5120',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $raportPath = $request->file('file_raport')->store('mandiri/raports', 'public');
        $aktePath = $request->file('file_akte')->store('mandiri/akte', 'public');

        $file = [
            'file_raport' => $raportPath,
            'file_akte' => $aktePath,
        ];
        Session::put('participant_file', $file);
        return redirect('/registrasi-kategori/mandiri/pilih-kelas/' . $slug);
    }

    public function pilihKelas($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $participantData = Session::get('participant_data');
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
        // dd($jarak);
        $pageTitle = 'Pilih Kelas';
        return view('Resources.pilih-kelas', compact('event', 'kelas', 'category', 'jarak', 'pageTitle'));
    }

    public function postKelasMandiri(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        if (!$event) {
            return redirect()->back()->with('error', 'Kategori event tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'no_participant.*' => 'required|string',
            'price.*' => 'nullable|numeric',
            'jarak.*' => 'required|string',
            'minutes.*' => 'nullable|numeric|min:0|max:59',
            'seconds.*' => 'nullable|numeric|min:0|max:59',
            'milliseconds.*' => 'nullable|numeric|min:0|max:999',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $participantData = Session::get('participant_data');
        $participantFile = Session::get('participant_file');
        $dataToSave = array_merge($participantData, $participantFile);
        $participant = Participants::create($dataToSave);
        $registration = Registrations::create([
            'user_id' => Auth::user()->id,
            'event_id' => $eventId->id,
            'no_registration' => strtoupper(bin2hex(random_bytes(5))),
            'type' => 'Mandiri',
            'status' => 'Pending',
        ]);

        $participantRegistration = Participant_registrations::create([
            'registration_id' => $registration->id,
            'participan_id' => $participant->id,
        ]);
        Session::put('participant_registration_id', $participantRegistration->id);
        $class = $request->category_event_id;

        foreach ($request->no_participant as $index => $noParticipant) {
            $noRenang = strtoupper(bin2hex(random_bytes(3)));
            $lastRecord = $request->last_record[$index] ?? null;
            $jarak = $request->jarak[$index];
            $priceDistance = Distance::where('jarak', $jarak)->first();
            participant_categories::create([
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
        return redirect('/registrasi-kategori/mandiri/ringkasan/' . $slug);
    }
    public function RingkasanPembayaranMandiri(Request $request, $slug)
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
        $registrasi = Registrations::where('user_id', Auth::id())->where('status', 'Pending')->where('type', 'Mandiri')->first();
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
        return view('Resources.rincian-pembayaran', compact('checkout', 'event', 'admin', 'kelas', 'nomor', 'price', 'grand', 'participantCategories', 'pageTitle'));
    }
}
