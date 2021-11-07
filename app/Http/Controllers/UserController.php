<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index()
    {
        $d  = User::find(Auth::id());
        $data = [
            'user'  => User::all(),
            'role_'  => $d->role,
            'name'   => $d->name,
            'dc'     => $d->kode_dc,
            'mail'   => $d->email
        ];
        return  view('user', $data);
    }

    public function addUser()
    {
        $d  = User::find(Auth::id());
        $data = [
            'role_'  => $d->role,
            'name'   => $d->name,
            'dc'     => $d->kode_dc,
            'mail'   => $d->email
        ];
        return view('tambahuser', $data);
    }

    public function storeUser(Request $req)
    {
        $request =  $req->all();
        $validator = Validator::make($request, [
            'kode_dc'       => 'required',
            'name'          => 'required|unique:users',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:6',
            'role'          => 'required',
            'password1'     => 'required|min:6',
        ], [
            'kode_dc.required'    => 'harus di isi',
            'name.required'       => 'harus di isi ',
            'name.unique'         => 'username sudah ada',
            'email.required'      => 'harus di isi',
            'email.unique'        => 'email sudah ada',
            'email.email'         => 'email tidak  valid',
            'password.required'   => 'harus di isi',
            'password.min'        => 'password minimal 6 karakter',
            'password1.required'  => 'harus di isi',
            'password1.min'       => 'password minimal 6 karakter',
            'role.required'       => 'harus di isi'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'msg'       => 0,
                'error'     => $validator->errors()->toArray()
            ]);
        } else {
            User::create([
                'kode_dc'               => $req->kode_dc,
                'name'                  => $req->name,
                'email'                 => $req->email,
                'password'              => Hash::make($req->password),
                'email_verified_at'     => \Carbon\Carbon::now(),
                'role'                  => $req->role
            ]);
            return response()->json([
                'msg'     => 1,
                'pesan'   => "user ditambah"
            ]);
        }
    }
}
