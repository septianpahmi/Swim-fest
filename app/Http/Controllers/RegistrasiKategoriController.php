<?php

namespace App\Http\Controllers;

use LDAP\Result;
use App\Models\Events;
use App\Models\Regency;
use App\Models\District;
use App\Models\Province;
use App\Models\Categories;
use App\Models\Participants;
use Illuminate\Http\Request;
use App\Models\Registrations;
use App\Models\Category_events;
use App\Http\Controllers\Controller;
use App\Models\Category_classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegistrasiKategoriController extends Controller
{
    public function index($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $maintenanceMode = true;

        if ($maintenanceMode) {
            return redirect()->route('detail.lomba', ['slug' => $eventId->slug])->with('error', 'Halaman ini sedang dalam tahap pemeliharaan. Silakan coba lagi nanti.');
        }
        $pageTitle = 'Registrasi';
        return view('Resources.registrasi', compact('event', 'pageTitle'));
    }

    public function mandiri($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $maintenanceMode = true;

        if ($maintenanceMode) {
            return redirect()->route('registrasi.kategori', ['slug' => $eventId->slug])->with('error', 'Halaman ini sedang dalam tahap pemeliharaan. Silakan coba lagi nanti.');
        }
        // $userRegistered = Registrations::where('event_id', $eventId)
        //     ->where('user_id', Auth::user()->id)->where('type', 'Mandiri')
        //     ->exists();

        // if ($userRegistered) {
        //     return redirect()->back()
        //         ->with('error', 'You have already registered for this event.');
        // }
        $provinsi = Province::orderBy('name', 'asc')->get();
        $pageTitle = 'Registrasi Mandiri';
        return view('Resources.form-registrasi-mandiri', compact('event', 'provinsi', 'pageTitle'));
    }
    public function kelompok($slug)
    {

        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $maintenanceMode = true;

        if ($maintenanceMode) {
            return redirect()->route('registrasi.kategori', ['slug' => $eventId->slug])->with('error', 'Halaman ini sedang dalam tahap pemeliharaan. Silakan coba lagi nanti.');
        }
        $userRegistered = Registrations::where('event_id', $eventId->id)
            ->where('user_id', Auth::user()->id)->where('type', 'Kelompok')->where('status', 'Draft')
            ->exists();

        if ($userRegistered) {
            return redirect()->route('kelompok.listdetail', ['slug' => $eventId->slug])
                ->with('error', 'Anda masih memiliki registrasi yang belum terselesaikan, silahka lanjutkan.');
        }
        $provinsi = Province::orderBy('name', 'asc')->get();
        $pageTitle = 'Registrasi Kelompok';
        return view('Resources.kelompok.form-registrasi-kelompok', compact('provinsi', 'event', 'pageTitle'));
    }
    public function addKelompok($slug)
    {
        $eventId = Events::where('slug', $slug)->first();
        $event = Category_events::where('event_id', $eventId->id)->first();
        $provinsi = Province::orderBy('name', 'asc')->get();
        $pageTitle = 'Tambah Partisipan';
        return view('Resources.kelompok.form-addregistrasi-kelompok', compact('provinsi', 'event', 'pageTitle'));
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
        $cities = Regency::all();
        $districts = District::all();
        $participant = Participants::find($id);
        $pageTitle = 'Edit Partisipan';
        return view('Resources.kelompok.form-editPeserta', ['provinsi' => $provinsi, 'event' => $event, 'participant' => $participant, 'cities' => $cities, 'districts' => $districts, 'pageTitle' => $pageTitle]);
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

    // public function getCategories(Request $request)
    // {
    //     $category_event_id = $request->category_event_id;
    //     $kelas = Category_classes::where('class_id', $category_event_id)->pluck('category_id')->toArray();
    //     $category = Categories::whereIn('id', $kelas)->get();
    //     echo "<option value=''>Pilih Nomor</option>";
    //     foreach ($category as $cat) {
    //         echo "<option value='$cat->name'>$cat->category_name</option>";
    //     }
    // }
}
