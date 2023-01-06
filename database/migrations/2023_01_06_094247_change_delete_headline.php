<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDeleteHeadline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_headline_id_foreign');
            $table->foreign('headline_id')
                ->references('id')
                ->on('headlines')
                ->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_headline_id_foreign');
            $table->foreign('headline_id')
                ->references('id')
                ->on('headlines')
                ->onDelete('cascade');
        });
    }
}
