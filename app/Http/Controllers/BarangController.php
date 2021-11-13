<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Sarana;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    //
    public function barang()
    {
        $pge = $_GET['page'];
        $kodeDC = "G001";
        $d  = User::find(Auth::id());
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
        } else {
            $status_approved = "Menunggu Approved";
        }
        $barang = Service::where('status_approved', $status_approved)->where('kode_dc', $kodeDC)->get();

        $status = [
            "Menunggu Approved",  "Approved",  "Dalam Antrian", "Proses Service", "Selesai Service", "Sudah Di Kirim"
        ];

        $Jumlah0 = Service::where('status_approved', $status[0])->where('kode_dc', $kodeDC)->get();
        $Jumlah1 = Service::where('status_approved', $status[1])->where('kode_dc', $kodeDC)->get();
        $Jumlah2 = Service::where('status_approved', $status[2])->where('kode_dc', $kodeDC)->get();
        $Jumlah3 = Service::where('status_approved', $status[3])->where('kode_dc', $kodeDC)->get();
        $Jumlah4 = Service::where('status_approved', $status[4])->where('kode_dc', $kodeDC)->get();
        $Jumlah5 = Service::where('status_approved', $status[5])->where('kode_dc', $kodeDC)->get();


        $data = [
            'page'               => $pge,
            'role_'              => $d->role,
            'daftar_barang'      => $barang,
            'countService'       => $Jumlah0->count(),
            'countService1'      => $Jumlah1->count(),
            'countService2'      => $Jumlah2->count(),
            'countService3'      => $Jumlah3->count(),
            'countService4'      => $Jumlah4->count(),
            'countService5'      => $Jumlah5->count(),
            'role_'              => $d->role,
            'name'               => $d->name,
            'dc'                 => $d->kode_dc,
            'mail'               => $d->email
        ];
        return view('daftarbarang', $data);
    }

    //load modal data detail barang service
    public function detailModal()
    {
        $id  = $_GET['id'];
        $d  = User::find(Auth::id());
        $data = [
            'barang'  => Service::find($id)
        ];
        return view('modal_detail_barang', $data);
    }

    //load modal data 
    public function modalformMusnah()
    {
        $data = [
            'id'  => $_GET['id']
        ];
        return view('formMusnah', $data);
    }

    //update status barang
    public function updateBarang()
    {
        $data = Service::find($_GET['id']);
        $data->status_approved = $_GET['status'];
        $data->tgl_approved = date('Y-m-d h:i:s');
        $data->nama_approved = "Andika";
        if ($_GET['status'] ==  "Sudah Di Kirim") {
            $upd = Sarana::where('sn', $data->sn)->first();
            $upd->status = "AKTIF";
            $upd->update();
        }

        if ($_GET['status'] == "Dalam Antrian") {
            $data->tgl_diterima = date('Y-m-d  h:i:s');
        }

        if ($_GET['status'] == "Proses Service") {
            $data->tgl_service = date('Y-m-d  h:i:s');
        }

        if ($_GET['status'] == "Selesai Service") {
            $data->selesai_service = date('Y-m-d  h:i:s');
        }
        $data->update();
        echo "Success";
    }

    //hapus data barang 
    public function hapusBarang(Request $req)
    {
        $id = $req->id;
        $data = Service::find($id);
        $upd = Sarana::where('sn', $data->sn)->first();
        $upd->status = "AKTIF";
        $upd->update();
        $data->delete();
        echo "Di batalkan";
    }
}
