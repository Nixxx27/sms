<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_id');
            $table->string('id_num');
            $table->string('name');
            $table->string('item_name');
            //$table->integer('quantity');
            $table->dateTime('date');
            $table->string('serial');
            $table->string('property_num');
            $table->string('category');
            $table->string('condition');
            $table->timestamps();
        });

        Schema::create('return', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_id');
            $table->string('id_num');
            $table->string('name');
            $table->string('item_name');
            //$table->integer('quantity');
            $table->dateTime('date_borrow');
            $table->dateTime('date_return');
            $table->string('serial');
            $table->string('property_num');
            $table->string('category');
            $table->string('condition');
            $table->timestamps();
        });

        Schema::create('lost', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_id');
            $table->string('id_num');
            $table->string('name');
            $table->string('item_name');
            $table->integer('quantity');
            $table->dateTime('date_borrow');
            $table->dateTime('date_return');
            $table->string('serial');
            $table->string('property_num');
            $table->string('category');
            $table->string('condition');
            $table->timestamps();
        });

        Schema::create('reserve', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_id');
            $table->string('id_num');
            $table->string('name');
            $table->string('item_name');
            $table->integer('quantity');
            $table->dateTime('date_reserve');
            $table->dateTime('date_expire');
            $table->string('serial');
            $table->string('property_num');
            $table->string('category');
            $table->string('condition');
            $table->timestamps();
        });

        Schema::create('serial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial');
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
        Schema::drop('borrow');
        Schema::drop('return');
        Schema::drop('lost');
        Schema::drop('reserve');
        Schema::drop('serial');
    }
}
