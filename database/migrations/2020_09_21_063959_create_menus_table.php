<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order');
            $table->string('slug');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('photo')->nullable();
            $table->binary('sub_menus');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('cc_users');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement("ALTER TABLE `cc_menus` CHANGE `sub_menus` `sub_menus` LONGBLOB NOT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cc_menus');
    }
}
