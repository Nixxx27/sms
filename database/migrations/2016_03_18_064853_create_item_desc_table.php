<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemDescTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_desc', function (Blueprint $table) {
        $table->increments('id');
        $table->string('item_name');
        $table->timestamps();
    });

        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_name');
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
        Schema::drop('item_desc');
        Schema::drop('category');
    }
}
