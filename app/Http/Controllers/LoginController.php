<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function proses(Request $request){
       $credential = $request->validate([
            'email'=>'required|email',
            'password'=> 'required'
        ],[
            'email.required' => 'email ini tidak boleh kosong',
            'email,email' => 'format Email salah',
            'password.required' => 'password tidak boleh kosong',
        ]);
        if (Auth::attempt($credential)){
            $request->session()->regenerate();
            if (Auth::user()->name == "admin") {
                return redirect('/admin');
            }
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'Tidak ada akun',
        ])->onlyInput('email');
    }
    public function keluar(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/');
    }
}
