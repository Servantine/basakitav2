<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class AuthController extends Controller
{
    function index(){
        return view('welcome');
    }
    function loginin(){
        return view('login');
    }

    function login (Request $request){

        $user = Users::where('email','=',$request->email)->first();
        if($user && $request->password == $user->password){
            Auth::login($user);
            if(Auth::check()){
                if(Auth::user()->roles == 'wargalokal'){
                    return redirect('/warlok');
                }elseif (Auth::user()->roles == 'pengantar'){
                    return redirect('/pengantar');
                }elseif (Auth::user()->roles == 'pemilikbank'){
                    return redirect('/pemilik');
                }
            }else{
                return "not logged in";
            }
           // return "Success";
          }else{
            return redirect()->back()->with(['error' => 'Invalid credentials']);
          }
     
    
    }

    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
