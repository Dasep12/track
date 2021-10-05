<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function barang()
    {
        $pge = $_GET['page'];
        $page = null;
        if ($pge == 1) {
            $page = 1;
        } else if ($pge == 2) {
            $page = 2;
        } else if ($pge == 3) {
            $page = 3;
        } else if ($pge == 4) {
            $page = 4;
        } else {
        }

        $data = [
            'page'  => $page
        ];
        return view('daftarbarang', $data);
    }
}
