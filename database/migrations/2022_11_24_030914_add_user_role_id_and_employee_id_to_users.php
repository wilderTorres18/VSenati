<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->unsignedBigInteger('user_role_id')->nullable();
          $table->foreign('user_role_id')->references('id')->on('user_roles')->onDelete('set null');

          $table->unsignedBigInteger('employee_id')->unique()->nullable();
          $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropForeign(['user_role_id']);
          $table->dropForeign(['employee_id']);
        });
    }
};
