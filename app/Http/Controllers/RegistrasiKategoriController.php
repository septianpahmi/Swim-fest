<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Regency;

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
        $provinsi = Province::all();
        return view('Resources.form-registrasi-mandiri', compact('event', 'provinsi'));
    }
    public function kelompok($slug)
    {
        $eventId = Events::where('slug', $slug)->select('id');
        $event = Category_events::where('event_id', $eventId)->first();
        $provinsi = Province::all();
        return view('Resources.kelompok.form-registrasi-kelompok', compact('provinsi', 'event'));
    }

    public function getKabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $prov = Province::where('name', $id_provinsi)->first();
        $kabupaten = Regency::where('province_id', $prov->id)->get();
        foreach ($kabupaten as $kab) {
            echo "<option value='$kab->name'>$kab->name</option>";
        }
    }
    public function getKecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $kab = Regency::where('name', $id_kabupaten)->first();
        $kecamatan = District::where('regency_id', $kab->id)->get();
        foreach ($kecamatan as $kec) {
            echo "<option value='$kec->name'>$kec->name</option>";
        }
    }
}
