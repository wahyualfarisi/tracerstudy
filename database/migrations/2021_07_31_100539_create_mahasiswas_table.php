<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id_mahasiswa');
            $table->string('nim')->unique();
            $table->year('tahun_lulus');
            $table->enum('kode_prodi', ['','SI','SK']);
            $table->string('nama_lengkap', 30);
            $table->string('no_telepon', 30);
            $table->string('email', 30)->unique();
            $table->text('password', 30);
            $table->text('alamat');
            $table->string('kode_pos', 10);
            $table->text('photo');
            $table->date('tanggal_ujian_skripsi');
            $table->text('judul_skripsi');
            $table->text('dospem_1');
            $table->text('dospem_2');
            $table->string('ipk');

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
        Schema::dropIfExists('mahasiswas');
    }
}
