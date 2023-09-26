<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDestinasiWisataTable extends Migration
{
    public function up()
    {
        Schema::table('destinasi_wisata', function (Blueprint $table) {
            $table->renameColumn('harga_masuk', 'harga_masuk_roda_dua');
            $table->decimal('harga_masuk_roda_empat', 10, 2)->after('harga_masuk');
        });
    }

    public function down()
    {
        Schema::table('destinasi_wisata', function (Blueprint $table) {
            $table->renameColumn('harga_masuk_roda_dua', 'harga_masuk');
            $table->dropColumn('harga_masuk_roda_empat');
        });
    }
}