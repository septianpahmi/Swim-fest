<?php

namespace App\Http\Controllers;

use App\Models\Participants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegistrasiMandiriController extends Controller
{
    public function file()
    {
        return view('Resources.file-registrasi-mandiri');
    }
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'participant_name' => 'required|string|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required|string|max:150',
            'province' => 'required|string|max:30',
            'city' => 'required|string|max:30',
            'district' => 'required|string|max:30',
            'zip_code' => 'required|string|max:5',
            'school' => 'required|string|max:60',
            'email' => 'required|string|email|max:255|',
        ]);

        // dd($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Session::put('participant_data', $request->all());
        return redirect('/registrasi-kategori/mandiri/file');
    }

    public function uploadFile(Request $request)
    {
        $participantData = Session::get('participant_data');
        if (!$participantData) {
            return redirect('/registrasi-kategori/mandiri')->with('error', 'Data peserta tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'file_raport' => 'required|file|mimes:pdf|max:2048',
            'file_akte' => 'required|file|mimes:pdf|max:2048',
        ]);

        // dd($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $year = $participantData['years'];
        $month = $participantData['month'];
        $date = $participantData['date'];
        $raportPath = $request->file('file_raport')->store('raports');
        $aktePath = $request->file('file_akte')->store('akte');

        $participantData['date_of_birth'] = sprintf('%04d-%02d-%02d', $year, $month, $date);
        $participantData['user_id'] = Auth::user()->id;
        $participantData['file_raport'] = $raportPath;
        $participantData['file_akte'] = $aktePath;

        Participants::create($participantData);
        Session::forget('participant_data');

        return redirect('/registrasi-kategori/mandiri/pilih-kelas');
    }

    public function pilihKelas()
    {
        return view('Resources.pilih-kelas');
    }
}
