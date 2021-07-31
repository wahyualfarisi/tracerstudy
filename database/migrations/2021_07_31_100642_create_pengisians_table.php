<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengisiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengisians', function (Blueprint $table) {
            $table->increments('id_pengisian');
            
            $table->integer('id_jadwal')->nullable()->unsigned();
            $table->foreign('id_jadwal')
                  ->references('id_jadwal')
                  ->on('jadwal_pengisians')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->integer('id_mahasiswa')->nullable()->unsigned();
            $table->foreign('id_mahasiswa')
                  ->references('id_mahasiswa')
                  ->on('mahasiswas')
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
        Schema::dropIfExists('pengisians');
    }
}
