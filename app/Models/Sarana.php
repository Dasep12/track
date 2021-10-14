<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kode_dc',
        'departement',
        'sarana',
        'aktiva',
        'sn',
        'tahun_perolehan',
        'status',
    ];

    protected $table = "tbl_sarana";
}
