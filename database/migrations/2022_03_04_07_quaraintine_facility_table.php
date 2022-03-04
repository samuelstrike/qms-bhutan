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
        Schema::create('quarantine_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('facility_name');
            $table->foreignId('dzongkhag_id')->constrained('dzongkhags');
            $table->foreignId('gewog_id')->constrained('gewogs');
            $table->bigInteger('no_of_rooms');
            $table->bigInteger('star_rating');
            $table->bigInteger('type_of_facility');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quarantine_facilities');
    }
};
