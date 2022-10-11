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
    public function up()
    {
        Schema::create('magazines', function (Blueprint $table) {
            $table->increments('magazineid');
            $table->string('name', 50);
            $table->integer('price');
            $table->string('publisher', 50)->nullable();
            $table->string('company_id'); // 登録者ID
            $table->foreign('company_id')->references('companyID')->on('companies')->OnDelete('cascade'); // 紐付け
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
        Schema::dropIfExists('magazines');
    }
};
