<?php

namespace App\Http\Controllers;

use LDAP\Result;
use App\Models\Events;
use App\Models\Regency;
use App\Models\District;
use App\Models\Province;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegistrasiKategoriController extends Controller
{
    public function index($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        return view('Resources.registrasi', compact('event'));
    }

    public function mandiri($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        // $userRegistered = Registrations::where('event_id', $eventId)
        //     ->where('user_id', Auth::user()->id)
        //     ->exists();

        // if ($userRegistered) {
        //     return redirect()->back()
        //         ->with('error', 'You have already registered for this event.');
        // }
        $provinsi = Province::orderBy('name', 'asc')->get();
        return view('Resources.form-registrasi-mandiri', compact('event', 'provinsi'));
    }
    public function kelompok($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        // $userRegistered = Registrations::where('event_id', $eventId)
        //     ->where('user_id', Auth::user()->id)
        //     ->exists();

        // if ($userRegistered) {
        //     return redirect()->back()
        //         ->with('error', 'You have already registered for this event.');
        // }
        $provinsi = Province::orderBy('name', 'asc')->get();
        return view('Resources.kelompok.form-registrasi-kelompok', compact('provinsi', 'event'));
    }
    public function editKelompok($id, $slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        if (!$eventId) {
            return redirect()->back()->with('error', 'Event tidak ditemukan.');
        }
        $event = Category_events::where('event_id', $eventId->id)->first();

        if (!$event) {
            return redirect()->back()->with('error', 'Kategori event tidak ditemukan.');
        }
        $provinsi = Province::all();
        $participant = Participants::find($id);
        return view('Resources.kelompok.form-editPeserta', ['provinsi' => $provinsi, 'event' => $event, 'participant' => $participant]);
    }
    public function getKabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $prov = Province::where('name', $id_provinsi)->first();
        $kabupaten = Regency::where('province_id', $prov->id)->orderBy('name', 'asc')->get();
        echo "<option value=''>Pilih Kabupaten/ Kota</option>";
        foreach ($kabupaten as $kab) {
            echo "<option value='$kab->name'>$kab->name</option>";
        }
    }
    public function getKecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $kab = Regency::where('name', $id_kabupaten)->first();
        $kecamatan = District::where('regency_id', $kab->id)->orderBy('name', 'asc')->get();
        echo "<option value=''>Pilih Kecamatan</option>";
        foreach ($kecamatan as $kec) {
            echo "<option value='$kec->name'>$kec->name</option>";
        }
    }
}
