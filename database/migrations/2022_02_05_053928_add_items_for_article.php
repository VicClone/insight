<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemsForArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('english_name');
            $table->longText('for_citation');
            $table->longText('for_citation_english');
            $table->longText('bibliography');
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
            $table->dropColumn('english_name');
            $table->dropColumn('for_citation');
            $table->dropColumn('for_citation_english');
            $table->dropColumn('bibliography');
        });
    }
}
