<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname', 225);
            $table->string('middlename', 225)->nullable();
            $table->string('lastname', 225);
            $table->string('position', 225)->nullable();
            $table->unsignedBigInteger('division');
            $table->unsignedBigInteger('unit');
            $table->foreign('division')->references('id')->on('cc_user_divisions');
            $table->foreign('unit')->references('id')->on('cc_user_units');
            $table->string('mobile_no', 225)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('username', 100)->unique();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->enum('role', ['admin', 'employee']);
            $table->enum('is_active', ['y', 'n'])->default('n');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
