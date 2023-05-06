<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColDocVerify extends Migration
{
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->boolean('verify')->nullable();
        });
    }

    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('verify');
        });
    }
}
