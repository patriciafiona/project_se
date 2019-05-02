<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->bigIncrements('no_rekamMedis');
            $table->string('id_pasien',10);
            $table->integer('id_rumahSakit');
            $table->integer('id_dokter');

            $table->string('jenis_perawatan')->default(1)->comment("1.Rawat jalan, 2.Rawat Inap");
            $table->string('diagnosa');
            $table->string('keluhan');
            $table->text('pemeriksaan');
            $table->string('terapi')->nullable();
            $table->string('pemeriksaan_penunjang')->nullable();
            $table->string('alergi_obat')->nullable();
            $table->text('kesimpulan');
            $table->string('kondisi_keluar');
            $table->timestamps(); //create at dan update at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
}
