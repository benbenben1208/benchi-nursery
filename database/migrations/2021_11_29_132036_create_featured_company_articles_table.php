<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedCompanyArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_company_articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_released');
            $table->foreignId('friku_company_id')->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('title');
            $table->string('thumbnail_url')->nullable();
            $table->integer('thumbnail_height')->nullable();
            $table->integer('thumbnail_width')->nullable();

            // export interface featuredCompanyArticle {
            //     id: string;
            //     createdAt: Date;
            //     updatedAt: Date;
            //     publishedAt: Date;
            //     isReleased: boolean;
            //     companyId: number;  => returnする際はここに企業データ入るイメージ
            //     title: string;
            //     thumbnail: {
            //       url: string;
            //       height: number;
            //       width: number;
            //     };
            //     body: {
            //       contents1: {
            //         subTitle: string;
            //         image1: string;
            //         image1Caption: string;
            //         image2: string;
            //         image2Caption: string;
            //         body: string;
            //       }
            //       contents2: {
            //         subTitle: string;
            //         image1: string;
            //         image1Caption: string;
            //         image2: string;
            //         image2Caption: string;
            //         body: string;
            //       }
            //       contents3: {
            //         subTitle: string;
            //         image1: string;
            //         image1Caption: string;
            //         image2: string;
            //         image2Caption: string;
            //         body: string;
            //       }
            //       contents4: {
            //         subTitle: string;
            //         image1: string;
            //         image1Caption: string;
            //         image2: string;
            //         image2Caption: string;
            //         body: string;
            //       }
            //     }
            //   }


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('featured_company_articles');
    }
}
