<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('startup_id')->nullable();
            $table->unsignedBigInteger('incu_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('skill');
            $table->string('phone');
            $table->timestamps();

            $table->foreign('startup_id')->references('id')->on('startups')->onDelete('cascade');
            $table->foreign('incu_id')->references('id')->on('incubations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_members');
    }
}
