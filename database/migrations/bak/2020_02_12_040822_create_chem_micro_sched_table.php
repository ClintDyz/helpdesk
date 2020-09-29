<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChemMicroSchedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_chem_micro_sched', function (Blueprint $table) {
            $table->string('sample_accept', 255);
            $table->text('remarks')->nullable();
            $table->string('tel_no', 255)->nullable();
            $table->string('telefax', 191)->nullable();
            $table->string('mobile_no', 191)->nullable();
            $table->string('email', 191)->nullable();
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
        Schema::dropIfExists('chem_micro_sched');
    }
}
