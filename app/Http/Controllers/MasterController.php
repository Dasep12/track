<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    //

    public function index()
    {
        $data = [
            'sarana'        => Sarana::all()
        ];
        return view('mastersarana', $data);
    }
}
