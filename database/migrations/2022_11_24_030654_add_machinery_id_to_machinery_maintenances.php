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
        Schema::table('machinery_maintenances', function (Blueprint $table) {
          $table->unsignedBigInteger('machinery_id')->nullable();
          $table->foreign('machinery_id')->references('id')->on('machineries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('machinery_maintenances', function (Blueprint $table) {
            $table->dropForeign(['machinery_id']);
        });
    }
};
