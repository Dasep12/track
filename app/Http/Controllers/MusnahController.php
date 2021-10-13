<?php

namespace App\Http\Controllers;

use App\Models\Musnah;
use App\Models\Sarana;
use App\Models\Service;
use Illuminate\Http\Request;
use Validator;

class MusnahController extends Controller
{
    //
    public function index()
    {
        $data = [
            'daftar_barang'  => Service::where('status_approved', 'Usulan Musnah')->get(),
            'page'           => $_GET['page']
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
            $dataMusnah->status_approved = "Usulan Musnah";
            $dataMusnah->update();
            return response()->json([
                'msg'  => 1,
                'pesan' => 'barang di usulkan musnah'
            ]);
            // //input data musnah ke dalam table musnah sarana
            // Musnah::create([
            //     'no_antrian'        => $dataMusnah->no_antrian,
            //     'kode_dc'           => $dataMusnah->kode_dc,
            //     'departement'       => $dataMusnah->departement,
            //     'sarana'            => $dataMusnah->sarana,
            //     'sn'                => $dataMusnah->sn,
            //     'aktiva'            => $dataMusnah->aktiva,
            //     'tgl_service'       => $dataMusnah->tanggal_diterima,
            //     'tanggal_musnah'    => date('Y-m-d'),
            //     'keterangan'        => $req->info,
            // ]);

            // //update data barang di tabel sarana
            // $d = Sarana::where('sn', $dataMusnah->sn)->first();
            // $d->status = "Musnah";
            // $d->update();

            // //hapus data di tabel service
            // $q = $dataMusnah->delete();
            // if ($q) {
            //     return response()->json([
            //         'msg'  => 1,
            //         'pesan' => 'barang di usulkan musnah'
            //     ]);
            // }
        }
    }
}
