U<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedArticleContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_article_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('featured_company_article_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('subTitle');
            $table->string('image1');
            $table->string('image1Caption');
            $table->string('image2');
            $table->string('image2Caption');
            $table->string('body');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('featured_article_contents');
    }
}
