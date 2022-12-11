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
        Schema::create('sister_concerns', function (Blueprint $table)
        {
            $table->id();
            $table->string('is_active')->boolval(true);
            $table->string('title', 150);
            $table->string('slug', 150);
            $table->string('banner', 200);
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('whatsapp');
            $table->string('instagram');
            $table->longText('description');
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
        Schema::dropIfExists('sister_concerns');
    }
};
