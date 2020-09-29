<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChemMicroAddInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_chem_micro_add_info', function (Blueprint $table) {
            $table->unsignedBigInteger('chem_micro_id');
            $table->foreign('chem_micro_id')->references('id')->on('cc_chem_micro_analysis');
            $table->text('info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cc_chem_micro_add_info');
    }
}
