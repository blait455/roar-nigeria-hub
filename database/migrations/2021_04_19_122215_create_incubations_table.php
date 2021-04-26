<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncubationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incubations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('idea_duration');
            $table->string('idea_description');
            $table->string('motivation');
            $table->string('medium_aware');
            $table->string('problem');
            $table->string('type');
            $table->string('age');
            $table->string('fav_color');
            $table->string('course');
            $table->string('fav_subject');
            $table->string('biz_experience');
            $table->string('reason');
            $table->integer('status');
            $table->unsignedBigInteger('aspect_id');
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
        Schema::dropIfExists('incubations');
    }
}
