<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKontakToDestinasiWisataTable extends Migration
{
    public function up()
    {
        Schema::table('destinasi_wisata', function (Blueprint $table) {
            $table->string('kontak')->nullable();
        });
    }

    public function down()
    {
        Schema::table('destinasi_wisata', function (Blueprint $table) {
            $table->dropColumn('kontak');
        });
    }
}
