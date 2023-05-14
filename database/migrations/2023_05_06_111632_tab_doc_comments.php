<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabDocComments extends Migration
{
    public function up()
    {
        Schema::create('comments_doc', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->integer('id_doctor');
            $table->integer('grade');
            $table->string('text');
//            $table->string('message');
//            $table->string('file');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_doc');
    }
}
