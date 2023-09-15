<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingToUlasan extends Migration
{
    public function up()
    {
        Schema::table('ulasan', function (Blueprint $table) {
            $table->unsignedInteger('rating')->nullable();
        });
    }

    public function down()
    {
        Schema::table('ulasan', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
}
