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
            $table->boolean('has_cid')->nullable()->default(0); 
            $table->string('cid')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->bigInteger('phone_no');
            $table->string('present_address');
            $table->foreignId('purpose_category_id')->constrained('purpose_categories');
            $table->foreignId('occupation_id')->constrained('occupations');
            $table->string('travel_details');
            $table->string('travel_mode');
            $table->foreignId('from_dzongkhag_id')->constrained('dzongkhags');
            $table->foreignId('from_gewog_id')->constrained('gewogs');
            $table->foreignId('to_dzongkhag_id')->constrained('dzongkhags');
            $table->foreignId('to_gewog_id')->constrained('gewogs');
            $table->foreignId('vaccine_status_id')->constrained('vaccination_status');
            $table->date('expected_date');
            $table->string('file_name')->nullable();
            $table->string('r_status')->detault('P');
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
