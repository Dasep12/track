<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_service', function (Blueprint $table) {
            $table->id();
            $table->string('no_antrian');
            $table->string('kode_dc');
            $table->string('departement');
            $table->string('sarana');
            $table->string('sn');
            $table->string('aktiva');
            $table->string('tahun_perolehan');
            $table->string('keterangan');
            $table->string('nama_pic');
            $table->string('nik_pic');
            $table->string('tujuan');
            $table->string('tanggal_kirim');
            $table->string('status_approved');
            $table->string('tgl_approved');
            $table->string('nama_approved');
            $table->string('tgl_diterima');
            $table->string('selesai_service');
            $table->longText('info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_service');
    }
}
