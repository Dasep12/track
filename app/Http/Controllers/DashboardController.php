<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //  echo Auth::user()->role;
        $d  = User::find(Auth::id());
        $data = [
            'role_'  => $d->role,
            'name'   => $d->name,
            'dc'     => $d->kode_dc,
            'mail'   => $d->email
        ];
        return view('dashboard', $data);
    }
}
