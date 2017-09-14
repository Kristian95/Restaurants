<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('language_news', function (Blueprint $table) {
            $table->integer('language_id')->unsigned();
            $table->integer('news_id')->unsigned();
            $table->string('title')->nullable();
            $table->mediumText('text')->nullable();
            $table->timestamps();

            $table->primary(['language_id','news_id']);

            $table->foreign('language_id')->references('id')
                ->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('news_id')->references('id')
                ->on('news')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_news');
        Schema::dropIfExists('news');
    }
}
