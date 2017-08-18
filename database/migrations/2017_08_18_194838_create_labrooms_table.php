<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->unsigned()->index();
            $table->foreign('building_id')->references('id')
                    ->on('buildings')->onDelete('cascade');
                    
            $table->integer('roomNo');
            $table->integer('capacity');
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
        Schema::drop('labrooms');
    }
}
