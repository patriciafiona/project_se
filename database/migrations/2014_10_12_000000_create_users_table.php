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
            $table->char('jenis_kelamin',1)->comment("P: perempuan, L: laki-laki");
            $table->integer('massa_tubuh');
            $table->integer('golongan_darah')->comment("1.Golongan A, 2.Golongan B, 3.Golongan O, 4.Golongan AB");
            $table->string('foto')->nullable();
            $table->text('alamat');
            $table->integer('no_telp');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
