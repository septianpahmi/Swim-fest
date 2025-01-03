<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\Payments;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use App\Models\Category_classes;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use App\Models\participant_categories;
use Illuminate\Support\Facades\Session;
use App\Models\Participant_registrations;

class RingkasanController extends Controller
{
    public function RingkasanMandiri($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $registrasi = Registrations::where('user_id', Auth::id())->where('type', 'Mandiri')->where('status', 'Pending')->first();
        $registrasions = Participant_registrations::where('registration_id', $registrasi->id)->first();
        $participantCategory = participant_categories::where('participant_registration_id', $registrasions->id)->pluck('no_participant')->toArray();
        $category = Categories::whereIn('id', $participantCategory)->get();
        $kelasEvent = Participant_categories::where('participant_registration_id',  $registrasions->id)->pluck('category_event_id')->toArray();
        $kelas = Classes::whereIn('id', $kelasEvent)->get();
        $jarak = participant_categories::where('participant_registration_id', $registrasions->id)->pluck('jarak')->toArray();
        $pageTitle = 'Ringkasan';
        return view('Resources.ringkasan-mandiri', compact('event', 'category', 'kelas', 'pageTitle', 'jarak'));
    }

    public function RingkasanPembayaranMandiri($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
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

        $nomor = $participantCategories->count();
        $price = $participantCategories->sum('price');

        $total = $nomor > 0 ? $price * $nomor : 0;
        $grand = $price + 300000;
        $checkout = Payments::create([
            'registration_id' => $registrationId,
            'payment_method' => 1,
            'sub_total' => $price,
            'fee' => $total,
            'diskon' => 0,
            'grand_total' => $grand,
            'paid_at' => Carbon::now(),
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
        $pageTitle = 'Checkout Prosses';
        return view('Resources.rincian-pembayaran', compact('checkout', 'event', 'nomor', 'price', 'total', 'grand', 'pageTitle'));
    }

    // public function processCheckout(Request $request, $slug)
    // {
    //     $eventId = Events::where('slug', $slug)->select('id');
    //     $event = Category_events::where('event_id', $eventId)->first();
    //     $user = Auth::user();
    //     $registrationId = Registrations::where('user_id', $user->id)->value('id');
    //     return view('Resources.rincian-pembayaran', compact('event', 'nomor', 'price', 'total', 'grand'));
    // }
}
