<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class InputController extends Controller
{
    //

    public function index()
    {
        $d  = User::find(Auth::id());
        $data = [
            'data'   => Sarana::where('kode_dc', "G001")->where('status', 'AKTIF')->get(),
            'role_'  => $d->role,
            'name'   => $d->name,
            'dc'     => $d->kode_dc,
            'mail'   => $d->email
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
                'no_antrian'        => "G001" . date('Yhis'),
                'kode_dc'           => "G001",
                'departement'       => $sarana->departement,
                'sarana'            => $sarana->sarana,
                'sn'                => $sarana->sn,
                'aktiva'            => $sarana->aktiva,
                'tahun_perolehan'   => $sarana->tahun_perolehan,
                'keterangan'        =>   $req->deskripsi,
                'nama_pic'          => $req->nama_pic,
                'nik_pic'           => $req->nik_pic,
                'tujuan'            => $req->tujuan,
                'tanggal_kirim'     => date('Y-m-d'),
                'tgl_diterima'      => "null",
                'status_approved'   => "Menunggu Approved",
                'tgl_approved'      => "-",
                'status'            => 'SERVICE',
                'nama_approved'     => "-",
                'selesai_service'   => "-",
                'tgl_service'       => "-",
                'info'              => "-"
            ]);

            $sarana->status = "SERVICE";
            $sarana->update();

            return response()->json([
                'status' => 1,
                'pesan' => "Di usulkan Service",
            ]);
        }
    }
}
