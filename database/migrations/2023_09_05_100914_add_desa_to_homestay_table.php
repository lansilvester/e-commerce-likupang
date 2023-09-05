<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDesaToHomestayTable extends Migration
{
    public function up()
    {
        Schema::table('homestay', function (Blueprint $table) {
            $table->string('desa')->nullable()->default(null);
        });
    }

    public function down()
    {
        Schema::table('homestay', function (Blueprint $table) {
            $table->dropColumn('desa');
        });
    }
}
