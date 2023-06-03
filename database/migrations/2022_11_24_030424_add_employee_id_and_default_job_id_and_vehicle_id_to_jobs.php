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
        Schema::table('jobs', function (Blueprint $table) {
          $table->unsignedBigInteger('employee_id')->nullable();
          $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');

          $table->unsignedBigInteger('default_job_id')->nullable();
          $table->foreign('default_job_id')->references('id')->on('default_jobs')->onDelete('set null');

          $table->unsignedBigInteger('vehicle_id')->nullable();
          $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('set null');

          $table->unsignedBigInteger('employee_Upd_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
          $table->dropForeign(['employee_id']);
          $table->dropForeign(['default_job_id']);
          $table->dropForeign(['vehicle_id']);
        });
    }
};
