<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aspect_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('image');
            $table->string('logo');
            $table->integer('status');
            $table->string('idea');
            $table->text('description');
            $table->timestamps();
            $table->foreign('aspect_id')->references('id')->on('aspects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('startups');
    }
}
