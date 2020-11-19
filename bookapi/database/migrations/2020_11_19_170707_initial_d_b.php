<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialDB extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table){
            $table->bigIncrements('id');
            
            $table->string('name');
            $table->string('email');
            $table->string('password');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('Author', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('Category', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('Book', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('description');
            $table->integer('pages');
            $table->bigInteger('author_id')->nullable();
            $table->bigInteger('category_id')->nullable();

            $table->foreign('author_id')->references('id')->on('Author');
            $table->foreign('category_id')->references('id')->on('Category');
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('UserBook', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('book_id')->nullable();
            $table->bigInteger('user_id')->nullable();

            $table->foreign('book_id')->references('id')->on('Book');
            $table->foreign('user_id')->references('id')->on('User');
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('Review', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('description');
            $table->bigInteger('book_id')->nullable();
            $table->bigInteger('user_id')->nullable();

            $table->foreign('book_id')->references('id')->on('Book');
            $table->foreign('user_id')->references('id')->on('User');
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('Evaluation', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('description');
            $table->integer('stars');
            $table->bigInteger('book_id')->nullable();
            $table->bigInteger('user_id')->nullable();

            $table->foreign('book_id')->references('id')->on('Book');
            $table->foreign('user_id')->references('id')->on('User');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User');
        Schema::dropIfExists('Author');
        Schema::dropIfExists('Category');
        Schema::dropIfExists('Book');
        Schema::dropIfExists('UserBook');
        Schema::dropIfExists('Review');
        Schema::dropIfExists('Evaluation');
    }
}
