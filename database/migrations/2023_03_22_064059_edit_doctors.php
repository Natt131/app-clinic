<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditDoctors extends Migration
{
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->integer('id_user')->nullable();
        });
    }

    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('id_user');
        });
    }
}
