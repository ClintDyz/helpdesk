<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistReqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_checklist_req', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('services_id');
            $table->foreign('services_id')->references('id')->on('cc_services');
            $table->text('requirements');
            $table->text('where_secure');
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
        Schema::dropIfExists('cc_checklist_req');
    }
}
