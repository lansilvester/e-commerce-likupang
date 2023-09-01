<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouvenirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souvenir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_souvenir');
            $table->string('alamat')->nullable();
            $table->integer('harga')->nullable();
            $table->string('kontak')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('souvenir');
    }
}
