<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Setting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('rules1');
            $table->string('rules2');
            $table->string('rules3');
            $table->string('banner1');
            $table->string('banner2');
            $table->string('banner3');
            $table->string('about');
            $table->string('gambar1');
            $table->string('gambar2');
            $table->string('gambar3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
}
