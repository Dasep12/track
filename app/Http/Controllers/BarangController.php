<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function barang()
    {
        $pge = $_GET['page'];
        $kodeDC = "G001";
        $status_approved = null;
        if ($pge == 1) {
            $status_approved = "Menunggu Approved";
        } else if ($pge == 2) {
            $status_approved = "Approved";
        } else if ($pge == 3) {
            $status_approved = "Dalam Antrian";
        } else if ($pge == 4) {
            $status_approved = "Proses Service";
        } else if ($pge == 5) {
            $status_approved = "Selesai Service";
        } else if ($pge == 6) {
            $status_approved = "Sudah Di Kirim";
        }
        $barang = Service::where('status_approved', $status_approved)->where('kode_dc', $kodeDC)->get();
        $data = [
            'page'               => $pge,
            'daftar_barang'      => $barang,
        ];
        return view('daftarbarang', $data);
    }

    //load modal data detail barang service
    public function detailModal()
    {
        $id  = $_GET['id'];
        $data = [
            'barang'  => Service::find($id)
        ];
        return view('modal_detail_barang', $data);
    }
}
