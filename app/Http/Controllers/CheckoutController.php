<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Payments;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use App\Models\participant_categories;
use App\Models\Participant_registrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();

        $registrations = Registrations::where('user_id', Auth::id())->where('event_id', $event->id)->first();
        $registrations->status = "Success";
        $registrations->save();
        $participantRegistrations = Participant_registrations::where('registration_id', $registrations->id)->get();
        $participantCategories = collect();

        foreach ($participantRegistrations as $registration) {
            $categories = Participant_categories::where('participant_registration_id', $registration->id)->get();
            $participantCategories = $participantCategories->merge($categories);
        }
        $nomor = $participantCategories->count();

        $paymentMethod = $request->input('payment_method');
        $payment = Payments::find($id);
        $payment->payment_method = $paymentMethod;
        $payment->save();
        return view('Resources.transaction-success', compact('event', 'payment', 'nomor'));
    }
}
