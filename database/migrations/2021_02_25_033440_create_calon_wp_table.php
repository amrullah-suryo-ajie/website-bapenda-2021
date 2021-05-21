<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonWpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('calon_wp', function (Blueprint $table) {
            $table->id();
            $table->string('No_Pokok_WP');
            $table->tinyInteger('Jn_Wajib_Pajak');
            $table->tinyInteger('Jn_Usaha_WP');
            $table->tinyInteger('Kd_Usaha');
            $table->string('Nm_Usaha');
            $table->string('Klasifikasi_Usaha');
            $table->string('NPWP_Usaha');
            $table->tinyInteger('Kd_Kec');
            $table->tinyInteger('Kd_Kel');
            $table->string('Alamat_Usaha');
            $table->string('Nm_Izin');
            $table->string('No_Izin');
            $table->string('Tgl_Izin');
            $table->string('Email');
            $table->string('No_HP');
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
        Schema::dropIfExists('calon_wp');
    }
}
