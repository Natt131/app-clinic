<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditDoctors1 extends Migration
{
        public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {

            $table->string('id_speciality')->change();

        });
    }
    public function down()
    {
        //
    }
}
