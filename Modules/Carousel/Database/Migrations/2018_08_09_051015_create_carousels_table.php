<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('carousel_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('carousels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->integer('carousel_group_id')->unsigned()->index();
//            $table->foreign('carousel_group_id')->references('id')->on('carousel_groups')->onDelete('cascade');
            $table->string('name');
            $table->string('alt');
            $table->integer('position');
            $table->timestamps();
        });

        Schema::create('carousel_carousel_group', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carousel_id')->unsigned()->index();
            $table->foreign('carousel_id')->references('id')->on('carousels')->onDelete('cascade');
            $table->integer('carousel_group_id')->unsigned()->index();
            $table->foreign('carousel_group_id')->references('id')->on('carousel_groups')->onDelete('cascade');
            $table->boolean('active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousels');
        Schema::dropIfExists('carousel_group');
    }
}
