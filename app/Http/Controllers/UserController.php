<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Bank;

class UserController extends Controller
{
    public function simpanusers(Request $request){
    $input = $request->all();


    Users::create($input);

    return redirect('/login')->with($request->only('email', 'password'));
        
    }

    public function langganan($id, Request $request)
    {
    $user = Auth::user();
    $bank = Bank::find($id);
    $namabank = $bank->nama_bank;
    $user->langganan = $namabank;
    $user->save();
    return redirect('/warlokkmebali');
    }

    // public function langganansagan()
    // {
    // $user = Auth::user();
    // $user->langganan = "Bank Sagan";
    // $user->save();
    // return redirect('/warlokkmebali');
    // }

    public function warlokkmebali()
    {
    $nama = Auth::user()->name;
    $langganan = Auth::user()->langganan;
    $bank = Bank::all();
    return view('/warlok/dashboard' , ['key' => 'nama' ,'nama' => $nama , 'langganan' => $langganan , 'bank' => $bank]);

    }



}
