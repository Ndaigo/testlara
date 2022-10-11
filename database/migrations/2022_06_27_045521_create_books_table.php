<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }*/
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('bookid');
            $table->string('name', 50);
            $table->integer('price');
            $table->string('author', 50)->nullable();
            $table->string('user_id'); // 登録者ID
            $table->foreign('user_id')->references('userID')->on('users')->OnDelete('cascade'); // 紐付け
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
        Schema::dropIfExists('books');
    }
};
