<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChemMicroAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_chem_micro_analysis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('authorized', 255);
            $table->enum('analysis_type', ['physico_chem', 'micro_bio']);
            $table->string('sample', 255);
            $table->string('param_test', 255);
            $table->string('test_method', 255);
            $table->double('fee', 50, 2);
            $table->text('info');
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
        Schema::dropIfExists('cc_chem_micro_analysis');
    }
}
