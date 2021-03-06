<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{
    //

    public function index()
    {
        $d  = User::find(Auth::id());
        $data = [
            'sarana'        => Sarana::all(),
            'role_'  => $d->role,
            'name'   => $d->name,
            'dc'     => $d->kode_dc,
            'mail'   => $d->email
        ];
        return view('mastersarana', $data);
    }
}
