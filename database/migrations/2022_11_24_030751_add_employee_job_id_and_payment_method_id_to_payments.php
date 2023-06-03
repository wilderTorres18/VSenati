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
        Schema::table('payments', function (Blueprint $table) {
          $table->unsignedBigInteger('job_id')->nullable();
          $table->foreign('job_id')->references('id')->on('jobs')->onDelete('set null');
          $table->unsignedBigInteger('payment_method_id')->nullable();
          $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
          $table->dropForeign(['job_id']);
          $table->dropForeign(['payment_method_id']);
        });
    }
};
