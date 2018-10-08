<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('main_image');
            $table->text('lead');
            $table->text('slug');
            $table->text('content');
            $table->enum('main_image_type',['image', 'url']);
            $table->integer('created_by')->unsigned()->index();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('updated_by')->unsigned()->index();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('settings');
    }
}