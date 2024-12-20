<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Payments;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\participant_categories;
use Illuminate\Support\Facades\Session;

class RingkasanController extends Controller
{
    public function RingkasanMandiri($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $participantCategory = participant_categories::where('participant_registration_id', $event->id)->get();
        return view('Resources.ringkasan-mandiri', compact('event', 'participantCategory'));
    }

    public function RingkasanPembayaranMandiri($slug)
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
            // 'paid_at' => null,
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
        // return redirect()->route('checkout', $checkout->id);
        return view('Resources.rincian-pembayaran', compact('checkout', 'event', 'nomor', 'price', 'total', 'grand'));
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
