<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->increments('id_data_pekerjaan');

            $table->integer('id_mahasiswa')->nullable()->unsigned();
            $table->foreign('id_mahasiswa')
                  ->references('id_mahasiswa')
                  ->on('mahasiswas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('pekerjaan', 150);
            $table->string('jabatan', 150);
            $table->date('tanggal_bekerja');
            $table->date('tanggal_selesai')->nullable();
            $table->integer('isCurrent');
            
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
        Schema::dropIfExists('pekerjaans');
    }
}
