<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Validator;
use App\Models\Sarana;
use App\Imports\SaranaImport;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AddController extends Controller
{

    public function index()
    {
        $d  = User::find(Auth::id());
        $data = [
            'role_'  => $d->role,
            'name'   => $d->name,
            'dc'     => $d->kode_dc,
            'mail'   => $d->email
        ];
        return view('addsarana', $data);
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
        $d  = User::find(Auth::id());
        $data = [
            'role_'  => $d->role,
            'name'   => $d->name,
            'dc'     => $d->kode_dc,
            'mail'   => $d->email
        ];
        return view('uploadsarana', $data);
    }

    public function fileImport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file'   => 'required'
        ], [
            'file.required' => 'tidak ada file terpilih'
        ]);
        if (!$validator->passes()) {
            return redirect('/upload')->withErrors($validator)->withInput();
        } else {
            //$array = Excel::toCollection(new SaranaImport, $request->file);
            $array = Excel::toArray(new SaranaImport, $request->file);
            $count = 0;
            $i = 1;

            //cek serial number di sistem 
            for ($j = 0; $j <  count($array[0]); $j++) {
                for ($i = 0; $i < count($array[0][0]); $i++) {
                    $serial_number = $array[0][$j][$i];
                    foreach (Sarana::all() as $data) {
                        if ($data->sn == $serial_number) {
                            $info =  "serial number sudah ada " . $serial_number;
                            return redirect('/upload')->with('info', $info);
                        }
                    }
                }
            }

            //proses import data ke database
            $p = Excel::import(new SaranaImport, $request->file('file'));
            if ($p) {
                return back()->with('success', 'data sarana berhasil ditambah ke master');
            } else {
                return back()->with('success', 'gagal upload file ');
            }
        }
    }
}
