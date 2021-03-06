<?php

namespace App\Http\Controllers;

use App\Models\Musnah;
use App\Models\Sarana;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class MusnahController extends Controller
{
    //
    public function index()
    {
        if ($_GET['page'] == 1) {
            $daftar_barang  = Service::where('status_approved', 'Usulan Musnah')->get();
        } else if ($_GET['page'] == 2) {
            $daftar_barang    = Musnah::all();
        } else if ($_GET['page'] != 1 || $_GET['page'] != 2) {
            return "page not view";
        }
        $d  = User::find(Auth::id());
        $data = [
            'daftar_barang'      => $daftar_barang,
            'page'               => $_GET['page'],
            'countMusnah'        => Musnah::count(),
            'countusulan'        => Service::where('status_approved', 'Usulan Musnah')->get(),
            'role_'              => $d->role,
            'name'               => $d->name,
            'dc'                 => $d->kode_dc,
            'mail'               => $d->email
        ];
        return view('barangMusnah', $data);
    }

    public function musnah(Request $req)
    {
        # code...
        $id = $req->id;
        $validator = Validator::make($req->all(), [
            'info'   => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'msg' => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $dataMusnah  = Service::find($id);
            $dataMusnah->info = $req->info;
            $dataMusnah->selesai_service = date('Y-m-d');
            $dataMusnah->status_approved = "Usulan Musnah";
            $dataMusnah->update();
            return response()->json([
                'msg'  => 1,
                'pesan' => 'barang di usulkan musnah'
            ]);
        }
    }

    public function accMusnah(Request $req)
    {
        $dataMusnah = Service::find($req->id);
        //input data musnah ke dalam table musnah sarana
        Musnah::create([
            'no_antrian'        => $dataMusnah->no_antrian,
            'kode_dc'           => $dataMusnah->kode_dc,
            'departement'       => $dataMusnah->departement,
            'sarana'            => $dataMusnah->sarana,
            'sn'                => $dataMusnah->sn,
            'aktiva'            => $dataMusnah->aktiva,
            'tgl_service'       => $dataMusnah->tgl_diterima,
            'selesai_service'   => $dataMusnah->selesai_service,
            'tanggal_musnah'    => date('Y-m-d'),
            'status'            => 'Dimusnahkan',
            'info'              => $dataMusnah->info,
        ]);

        //update data barang di tabel sarana
        $d = Sarana::where('sn', $dataMusnah->sn)->first();
        $d->status = "Musnah";
        $upt = $d->update();

        //hapus data di tabel service
        $q = $dataMusnah->delete();
        if ($q && $upt) {
            return response()->json([
                'msg'  => 1,
                'pesan' => 'barang di usulkan musnah'
            ]);
        } else {
            return response()->json([
                'msg'  => 0,
                'pesan' => 'failed'
            ]);
        }
    }
}
