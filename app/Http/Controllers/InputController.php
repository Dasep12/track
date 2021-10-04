<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Models\Service;
use Illuminate\Http\Request;
use Validator;

class InputController extends Controller
{
    //

    public function index()
    {
        $data = [
            'data'   => Sarana::where('kode_dc', "G001")->get()
        ];
        return view('inputbarang', $data);
    }


    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'sarana'        => 'required',
            'deskripsi'     => 'required',
            'tujuan'        => 'required',
            'nama_pic'      => 'required',
            'nik_pic'       => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'pesan' => 'ada file kosong',
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $sarana = Sarana::find($req->sarana);

            Service::create([
                'kode_dc'           => "G001",
                'sarana'            => $sarana->sarana,
                'sn'                 => $sarana->sn,
                'aktiva'           => $sarana->aktiva,
                'tahun_perolehan'   => $sarana->tahun_perolehan,
                'keterangan'        =>   $req->deskripsi,
                'nama_pic'          => $req->nama_pic,
                'nik_pic'          => $req->nik_pic,
                'tujuan'            => $req->tujuan,
                'tanggal_kirim'     => date('Y-m-d'),
                'status_approved'  => "Menunggu Approved",
                'tgl_approved'    => "-",
                'status'           => 'SERVICE',
                'nama_approved'   => "-",
            ]);

            return response()->json([
                'status' => 1,
                'pesan' => "file di tambah",
            ]);
        }
    }
}
