<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditInfodo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_docs', function (Blueprint $table) {

            $table->string('education')->nullable()->change();
            $table->string('certificate')->nullable()->change();
            $table->string('spec')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('info_docs', function (Blueprint $table) {

            $table->string('education')->change();
            $table->string('certificate')->change();
            $table->string('spec')->change();
        });
    }
}
