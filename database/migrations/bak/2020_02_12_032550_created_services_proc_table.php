<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedServicesProcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_services_proc', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('services_id');
            $table->foreign('services_id')->references('id')->on('cc_services');
            $table->string('proccess_name');
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
        Schema::dropIfExists('cc_services_proq');
    }
}
