<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKulinerTable extends Migration
{
    public function up()
    {
        Schema::create('kuliner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NamaKuliner');
            $table->decimal('Harga', 10, 2);
            $table->string('Alamat');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kuliner');
    }
}
