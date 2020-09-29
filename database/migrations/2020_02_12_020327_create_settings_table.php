<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('agency_name', 255);
            $table->string('abbrev', 255)->nullable();
            $table->text('logo')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_no', 191)->nullable();
            $table->string('website', 200)->nullable();
            $table->string('email', 191)->nullable();
            $table->text('background')->nullable();
            $table->text('vision')->nullable();
            $table->text('mandate')->nullable();
            $table->text('mission')->nullable();
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
        Schema::dropIfExists('cc_settings');
    }
}
