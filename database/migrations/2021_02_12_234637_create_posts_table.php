<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->date('date');
            $table->string('name')->unique();
            
            $table->string('slug')->unique();

            $table->text('extract');
            $table->longText('body');
            $table->enum('status', [1, 2])->default(1); // 1 borrador y 2 publicado

            $table->unsignedBigInteger('user_id');
            //$table->unsignedBigInteger('category_id');

            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('posts');
    }
}
