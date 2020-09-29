<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('division');
            $table->unsignedBigInteger('unit_owner');
            $table->foreign('division')->references('id')->on('cc_user_division');
            $table->foreign('unit_owner')->references('id')->on('cc_user_unit');
            $table->binary('authorized')->nullable();
            $table->text('title');
            $table->text('description')->nullable();
            $table->string('office_division', 255);
            $table->string('classification', 100);
            $table->text('transaction_type');
            $table->string('who_avail', 200);
            $table->text('disp_picture')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cc_services');
    }
}
