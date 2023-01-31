<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcats', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('cat_id');
            $table->string('title');
            $table->string('img');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->timestamps();
        });
        Schema::table('subcats', function (Blueprint $table) {
            $table->foreign('cat_id', 'subcats_cat_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcats');
    }
}
