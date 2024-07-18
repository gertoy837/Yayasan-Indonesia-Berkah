<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutabaahTable extends Migration
{
    public function up()
    {
        Schema::create('mutabaah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal');
            $table->boolean('shubuh')->default(false);
            $table->boolean('dzuhur')->default(false);
            $table->boolean('ashar')->default(false);
            $table->boolean('maghrib')->default(false);
            $table->boolean('isya')->default(false);
            $table->string('tilawah')->nullable();
            $table->boolean('al_mulk')->default(false);
            $table->boolean('solawat')->default(false);
            $table->boolean('al_kahfi')->default(false);
            $table->boolean('tahajud')->default(false);
            $table->boolean('dhuha')->default(false);
            $table->boolean('rs')->default(false);
            $table->boolean('rd')->default(false);
            $table->boolean('rm')->default(false);
            $table->boolean('ri')->default(false);
            $table->boolean('dzikir_pagi')->default(false);
            $table->boolean('dzikir_petang')->default(false);
            $table->boolean('sahur_senin')->default(false);
            $table->boolean('sahur_kamis')->default(false);
            $table->boolean('workout_situp')->default(false);
            $table->boolean('workout_pushup')->default(false);
            $table->boolean('workout_run')->default(false);
            $table->string('reading_book')->nullable();
            $table->boolean('tiga_s')->default(false);
            $table->boolean('mendoakan_orangtua')->default(false);
            $table->boolean('bersyukur')->default(false);
            $table->boolean('mendoakan_oranglain')->default(false);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mutabaah');
    }
}

