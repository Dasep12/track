<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusnahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_musnah', function (Blueprint $table) {
            $table->id();
            $table->string('no_antrian');
            $table->string('kode_dc');
            $table->string('departement');
            $table->string('sarana');
            $table->string('sn');
            $table->string('aktiva');
            $table->string('tgl_service');
            $table->string('selesai_service');
            $table->string('tanggal_musnah');
            $table->string('status');
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
        Schema::dropIfExists('tbl_musnah');
    }
}
