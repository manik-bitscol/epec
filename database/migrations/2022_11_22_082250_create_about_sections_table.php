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
        Schema::create('about_sections', function (Blueprint $table)
        {
            $table->id();
            $table->string('title', 200);
            $table->string('image', 150);
            $table->string('logo', 150);
            $table->string('about');
            $table->string('mission');
            $table->string('vission');
            $table->string('value');
            $table->string('btn_text');
            $table->string('btn_link');
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
        Schema::dropIfExists('about_sections');
    }
};
