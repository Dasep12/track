<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Validator;

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

        $validation = Validator::make($req->all(), [
            'email'       => 'required|email',
            'password'   => 'required'
        ], [
            'email.required'            => 'isi email',
            'password.required'         => 'isi password'
        ]);

        if (!$validation->passes()) {
            return redirect('/')->withErrors($validation)
                ->withInput();
        } else {
            $data = [
                'email'      => $email,
                'password'   => $pwd
            ];

            Auth::attempt($data);

            if (Auth::check()) {
                return redirect('dashboard');
            } else {
                return redirect('/')->with('info', 'Perhatian ! akun tidak ada');
            }
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
