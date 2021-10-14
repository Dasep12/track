<?php

namespace App\Imports;

use App\Models\Sarana;
use Maatwebsite\Excel\Concerns\ToModel;

class SaranaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // $sarana = Sarana::all();
        // $count  =  0;
        // foreach ($sarana as $d) {
        //     if ($d->sn == $row[4]) {
        //         $count++;
        //     }
        // }


        return new Sarana(array(
            'kode_dc'           => $row[0],
            'departement'       => $row[1],
            'sarana'            => $row[2],
            'aktiva'            => $row[3],
            'sn'                => $row[4],
            'tahun_perolehan'   => $row[5],
            'status'            => $row[6],
        ));
    }
}
