<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPengisiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pengisians', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->date('tanggal_dimulai');
            $table->date('tanggal_selesai');

            $table->integer('id_user')->nullable()->unsigned();
            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('jadwal_pengisians');
    }
}
