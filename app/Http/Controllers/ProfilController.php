<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Registrations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index($id)
    {
        $data = Registrations::where('user_id', $id)->where('status', 'Success')->get();
        $user = User::where('id', $id)->first();
        return view('Resources.profil.pertandingan', compact('data', 'user'));
    }

    public function resetPassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::find($id);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('success', 'Keamanan berhasil diperbarui.');
    }
    public function updateProfil(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required|string|min:9',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Keamanan berhasil diperbarui.');
    }
}
