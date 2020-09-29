<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesProcNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_services_proc_note', function (Blueprint $table) {
            $table->unsignedBigInteger('services_id');
            $table->foreign('services_id')->references('id')->on('cc_services');
            $table->string('srv_proc_id');
            $table->foreign('srv_proc_id')->references('id')->on('cc_services_proc');
            $table->text('note');
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
        Schema::dropIfExists('cc_services_proq_note');
    }
}
