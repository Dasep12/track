<?php

namespace App\Http\Controllers;

use App\Models\Musnah;
use App\Models\Sarana;
use App\Models\Service;
use Illuminate\Http\Request;

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

    public function musnah()
    {
        # code...
        $id = $_GET['id'];

        $dataMusnah  = Service::find($id);
        echo json_encode($dataMusnah);

        //input data musnah ke dalam table musnah sarana
        $srn    = Musnah::create([
            'no_antrian'        => $dataMusnah->no_antrian,
            'kode_dc'           => $dataMusnah->kode_dc,
            'departement'       => $dataMusnah->departement,
            'sarana'            => $dataMusnah->sarana,
            'sn'                => $dataMusnah->sn,
            'aktiva'            => $dataMusnah->aktiva,
            'tgl_service'       => $dataMusnah->tanggal_diterima,
            'tanggal_musnah'    => date('Y-m-d'),
            'keterangan'        => $dataMusnah->info,
        ]);

        //update data barang di tabel sarana
        $d = Sarana::where('sn', $dataMusnah->sn)->first();
        $d->status = "Musnah";
        $d->update();

        //hapus data di tabel service
        $dataMusnah->delete();
    }
}
