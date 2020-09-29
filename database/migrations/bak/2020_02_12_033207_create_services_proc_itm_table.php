<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesProcItmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_services_proc_itm', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('services_id');
            $table->foreign('services_id')->references('id')->on('cc_services');
            $table->string('srv_proc_id');
            $table->foreign('srv_proc_id')->references('id')->on('cc_services_proc');
            $table->text('client_step');
            $table->text('agency_action');
            $table->double('fee', 50, 2)->nullable();
            $table->text('proc_time');
            $table->text('respond_person');
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
        Schema::dropIfExists('cc_services_proq_itm');
    }
}
