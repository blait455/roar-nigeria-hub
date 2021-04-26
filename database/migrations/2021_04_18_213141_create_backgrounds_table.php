<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('f1_bg')->default('default.png');
            $table->string('f2_bg')->default('default.png');
            $table->string('f3_bg')->default('default.png');
            $table->string('f4_bg')->default('default.png');
            $table->string('f5_bg')->default('default.png');
            $table->string('a1_bg')->default('default.png');
            $table->string('a2_bg')->default('default.png');
            $table->string('b1_bg')->default('default.png');
            $table->string('b2_bg')->default('default.png');
            $table->string('c_bg')->default('default.png');
            $table->string('e1_bg')->default('default.png');
            $table->string('e2_bg')->default('default.png');
            $table->string('s1_bg')->default('default.png');
            $table->string('s2_bg')->default('default.png');
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
        Schema::dropIfExists('backgrounds');
    }
}
