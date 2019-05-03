<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            //umur akan dihitung dari tanggal lahir
            $table->date('tanggal_lahir');
            $table->integer('jenis_user')->comment("1.Admin, 2.Dokter, 3.Pasien");
            $table->char('jenis_kelamin',1)->comment("P: perempuan, L: laki-laki");
            $table->integer('golongan_darah')->comment("1.Golongan A, 2.Golongan B, 3.Golongan O, 4.Golongan AB");
            $table->string('no_ktp');
            $table->string('foto',255);
            $table->text('alamat');
            $table->integer('no_telp');
            $table->string('email')->unique();
            $table->string('password',255);
            $table->integer('login')->comment("0.Offline, 1.Online")->default("0");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
