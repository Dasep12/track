<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musnah extends Model
{
    use HasFactory;


    protected $fillable = [
        'no_antrian', 'kode_dc', 'departement', 'sarana', 'sn', 'aktiva', 'tgl_service', 'tanggal_musnah', 'info', 'status', 'selesai_service'
    ];

    protected $table = "tbl_musnah";
}
