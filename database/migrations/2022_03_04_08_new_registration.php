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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id');
            $table->foreignId('nationality_id')->constrained('nationalities');
            $table->boolean('has_cid')->default(1); 
            $table->string('cid')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->bigInteger('phone_no');
            $table->string('present_address');
            $table->foreignId('purpose_category_id')->constrained('purpose_categories');
            $table->foreignId('occupation_id')->constrained('occupations');
            $table->string('travel_details');
            $table->foreignId('occupation_id')->constant('occupations');
            $table->string('travel_mode');
            $table->foreignId('from_dzongkhag_id')->constrained('dzongkhags');
            $table->foreignId('from_gewog_id')->constrained('gewogs');
            $table->foreignId('to_dzongkhag_id')->constrained('dzongkhags');
            $table->foreignId('to_gewog_id')->constrained('gewogs');
            $table->foreignId('vaccine_status_id')->constrained('vaccination_status');
<<<<<<< HEAD
            $table->string('r_status')->default('R');
=======
            $table->string('r_status')->detault('P');
>>>>>>> 88229f5018d0fa2eac7223144d1ce1f2e3b485dd
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
        Schema::dropifExists('registrations');
    }
};
