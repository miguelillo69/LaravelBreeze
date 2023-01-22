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
        Schema::create('gangas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('url');
            $table->bigInteger('category')->unsigned();
            $table->tinyInteger('likes')->unsigned()->nullable();
            $table->tinyInteger('unlikes')->unsigned()->nullable();
            $table->double('price')->unsigned()->nullable();
            $table->double('price_sale')->unsigned()->nullable();
            $table->boolean('available')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gangas', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->dropForeign('user_id');
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->dropForeign('category');
        });

    }
};
