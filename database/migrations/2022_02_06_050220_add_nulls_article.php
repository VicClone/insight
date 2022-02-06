<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullsArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('english_name')->nullable()->change();
            $table->longText('for_citation')->nullable()->change();
            $table->longText('for_citation_english')->nullable()->change();
            $table->longText('bibliography')->nullable()->change();
            $table->text('annotation_english')->nullable()->change();
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
            $table->string('english_name')->change();
            $table->longText('for_citation')->change();
            $table->longText('for_citation_english')->change();
            $table->longText('bibliography')->change();
            $table->text('annotation_english')->change();
        });
    }
}
