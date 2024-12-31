<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Events;
use App\Models\Payments;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\participant_categories;
use Illuminate\Support\Facades\Session;
use App\Models\Participant_registrations;

class CheckoutController extends Controller
{
    public function checkout(Request $request, $slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $user = Auth::user();
        $registrationId = Registrations::where('user_id', $user->id)->value('id');
        $participantRegistrationId = Session::get('participant_registration_id');
        if (!$participantRegistrationId) {
            return redirect()->route('home')->with('error', 'Data registrasi peserta tidak ditemukan.');
        }

        $participantCategories = participant_categories::where('participant_registration_id', $participantRegistrationId)->get();

        $nomor = $participantCategories->count();
        $payment = Payments::where('registration_id', $registrationId)->first();
        return view('Resources.checkout', compact('event', 'payment', 'nomor'));
    }

    public function successTransaction(Request $request, $id, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();

        $registrations = Registrations::where('user_id', Auth::id())->where('type', 'Kelompok')->where('status', 'Pending')->where('event_id', $eventId->id)->first();
        if (!$registrations) {
            return redirect()->route('profile', ['id' => Auth::id()])->with('error', 'Anda sudah melakukan pembayaran.');
        }
        $registrations->status = "Success";
        $registrations->save();
        $participantRegistrations = Participant_registrations::where('registration_id', $registrations->id)->get();
        $participantCategories = collect();

        foreach ($participantRegistrations as $registration) {
            $categories = Participant_categories::where('participant_registration_id', $registration->id)->get();
            $participantCategories = $participantCategories->merge($categories);
        }
        $admin = 5000;
        $paymentMethod = $request->query('payment_method');
        $nomor = $participantCategories->count();
        $payment = Payments::find($id);
        $payment->payment_method = $paymentMethod;
        $payment->save();
        $pageTitle = 'Checkout';
        return view('Resources.transaction-success', compact('event', 'admin', 'registrations', 'payment', 'nomor', 'pageTitle'));
    }
    public function successTransactionMandiri(Request $request, $id, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();

        $registrations = Registrations::where('user_id', Auth::id())->where('type', 'Mandiri')->where('status', 'Pending')->where('event_id', $eventId->id)->first();
        if (!$registrations) {
            return redirect()->route('profile', ['id' => Auth::id()])->with('error', 'Anda sudah melakukan pembayaran.');
        }
        $registrations->status = "Success";
        $registrations->save();
        $participantRegistrations = Participant_registrations::where('registration_id', $registrations->id)->get();
        $participantCategories = collect();
        foreach ($participantRegistrations as $registration) {
            $categories = Participant_categories::where('participant_registration_id', $registration->id)->get();
            $participantCategories = $participantCategories->merge($categories);
        }
        $admin = 5000;
        $nomor = $participantCategories->count();
        $paymentMethod = $request->query('payment_method');
        $payment = Payments::find($id);
        $payment->payment_method = $paymentMethod;
        $payment->save();
        $pageTitle = 'Checkout';
        return view('Resources.transaction-success', compact('event', 'registrations', 'payment', 'admin', 'nomor', 'pageTitle'));
    }
    public function checkoutDetailLomba(Request $request, $id, $regis, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $user = Auth::id();
        $registrations = Registrations::where('user_id', $user)->where('no_registration', $regis)->where('event_id', $eventId->id)->first();
        if (!$registrations) {
            return redirect()->back()->with('error', 'Anda sudah melakukan pembayaran.');
        }
        $registrations->status = "Success";
        $registrations->save();

        $paymentMethod = $request->query('payment_method');
        $payment = Payments::find($id);
        $payment->payment_method = $paymentMethod;
        $payment->save();
        return redirect()->route('detailLomba', ['id' => $user, 'regis' => $regis, 'slug' => $slug,])->with('success', 'Anda telah berhasil melakukan pembayaran.');
    }
}
