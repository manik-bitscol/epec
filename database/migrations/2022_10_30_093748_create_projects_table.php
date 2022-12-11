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
        Schema::create('projects', function (Blueprint $table)
        {

            $table->id();
            $table->unsignedSmallInteger('location_id');
            $table->unsignedSmallInteger('phase_id');
            $table->unsignedSmallInteger('type_id');
            $table->unsignedSmallInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->constrained()->cascadeOnDelete();
            $table->foreign('location_id')->references('id')->on('locations')->constrained()->cascadeOnDelete();
            $table->foreign('phase_id')->references('id')->on('phases')->constrained()->cascadeOnDelete();
            $table->foreign('type_id')->references('id')->on('types')->constrained()->cascadeOnDelete();
            $table->string('title', 200);
            $table->string('banner', 200);
            $table->string('address', 200);
            $table->string('duration');
            $table->string('start_time');
            $table->string('complete_time');
            $table->string('building_size');
            $table->string('construction_status');
            $table->string('location_map');
            $table->longText('details');
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
        Schema::dropIfExists('projects');
    }
};
