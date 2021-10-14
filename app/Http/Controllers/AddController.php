<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;
use App\Models\Sarana;
use App\Imports\SaranaImport;
use Maatwebsite\Excel\Facades\Excel;

class AddController extends Controller
{

    public function index()
    {
        return view('addsarana');
    }


    public function store(Request $req)
    {
        # code...
        $validator = Validator::make($req->all(), [
            'kode_dc'               => 'required',
            'departement'           => 'required',
            'sarana'                => 'required',
            'aktiva'                => 'required',
            'sn'                    => 'required|unique:tbl_sarana',
            'tahun_perolehan'       => 'required',
            'status'                => 'required',
        ], [
            'kode_dc.required'      => 'harus di isi',
            'departement.required'  => 'harus di isi',
            'sarana.required'       => 'harus di isi',
            'aktiva.required'       => 'harus di isi',
            'sn.required'           => 'harus di isi',
            'sn.unique'             => 'sn sudah ada',
            'status'                => 'harus di isi',
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'msg'  => 0,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $create = Sarana::create([
                'kode_dc'               => $req->kode_dc,
                'departement'           => $req->departement,
                'sarana'                => $req->sarana,
                'aktiva'                => $req->aktiva,
                'sn'                    => $req->sn,
                'tahun_perolehan'       => $req->tahun_perolehan,
                'status'                => $req->status,
            ]);
            if ($create) {
                return response()->json([
                    'msg'        => 1,
                    'pesan'      => 'sukses'
                ]);
            } else {
                return response()->json([
                    'msg'    => 2,
                    'error'  => 'gagal tambah sarana'
                ]);
            }
        }
    }


    public function formUpload(Type $var = null)
    {
        return view('uploadsarana');
    }

    public function fileImport(Request $request)
    {

        //$array = Excel::toCollection(new SaranaImport, $request->file);
        $array = Excel::toArray(new SaranaImport, $request->file);
        $count = 0;
        $i = 1;



        //$p = Excel::import(new SaranaImport, $request->file('file'));
        // if ($p) {
        //     return back()->with('success', 'berhasil');
        // } else {
        //     return back()->with('success', 'gagal upload file ');
        // }
    }
}
