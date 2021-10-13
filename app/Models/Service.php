<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_antrian', 'departement', 'kode_dc', 'sarana', 'sn', 'aktiva', 'tahun_perolehan', 'keterangan', 'nama_pic', 'nik_pic', 'tujuan', 'tanggal_kirim', 'status_approved', 'tgl_approved', 'nama_approved', 'info', 'tgl_diterima', 'selesai_service'
    ];
    protected $table = "tbl_service";
}
