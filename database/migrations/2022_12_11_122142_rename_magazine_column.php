<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameMagazineColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('headlines', function (Blueprint $table) {
            $table->renameColumn('magazin_id', 'magazine_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('headlines', function (Blueprint $table) {
            $table->renameColumn('magazine_id', 'magazin_id');
        });
    }
}
