<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengisianDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengisian_details', function (Blueprint $table) {
            $table->increments('id_pengisian_detail');

            $table->integer('id_pengisian')->nullable()->unsigned();
            $table->foreign('id_pengisian')
                  ->references('id_pengisian')
                  ->on('pengisians')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->integer('id_pertanyaan')->nullable()->unsigned();
            $table->foreign('id_pertanyaan')
                  ->references('id_pertanyaan')
                  ->on('pertanyaans')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->integer('id_jawaban')->nullable()->unsigned();
            $table->foreign('id_jawaban')
                  ->references('id_jawaban')
                  ->on('jawabans')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->string('additional', 100)->nullable();

            
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
        Schema::dropIfExists('pengisian_details');
    }
}
