<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;

    protected $fillable = [
        'sarana', 'aktiva', 'sn', 'tahun_perolehan', 'status', 'kode_dc'
    ];

    protected $table = "tbl_sarana";
}
