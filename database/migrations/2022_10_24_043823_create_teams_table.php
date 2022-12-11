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
        Schema::create('teams', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('role_id')->cascadeOnDelete();
            $table->string('name', 150);
            $table->string('designation', 150);
            $table->string('degreee', 150)->nullable();
            $table->string('experience', 150)->nullable();
            $table->string('phone_number_1', 20)->nullable();
            $table->string('phone_owner_1', 20)->nullable();
            $table->string('phone_number_2', 20)->nullable();
            $table->string('phone_owner_2', 20)->nullable();
            $table->string('facebook_account')->nullable();
            $table->string('whatsapp_account')->nullable();
            $table->string('instagram_account')->nullable();
            $table->string('twitter_account')->nullable();
            $table->string('linkedin_account')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_owner_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('email_owner_2')->nullable();
            $table->string('join_date')->nullable();
            $table->string('signature', 150)->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('teams');
    }
};
