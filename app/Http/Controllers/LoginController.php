<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('login');
    }


    public function cekLogin(Request $req)
    {
        $email   = $req->email;
        $pwd     = $req->password;

        $data = [
            'email'      => $email,
            'password'   => $pwd
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return "akun tidak ada";
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
