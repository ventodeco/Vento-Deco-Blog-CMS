<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('post_id')->nullable();
            $table->text('body');
            $table->timestamps();
        });

        // Schema::table('comments', function ($table) {
        //     $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        // });

        // Schema::table('comments', function ($table) {
        //     $table->foreign('user_id')->references('id')->('users')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropforeign(['post_id']);
        // Schema::dropforeign(['user_id']);
        Schema::dropIfExists('comments');
    }
}
