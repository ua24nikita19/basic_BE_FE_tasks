<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_models', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('full_name',200);
            $table->string('position',100);
            $table->date('employment_date');
            $table->float('salary',20);
            $table->unsignedTinyInteger('boss_id')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_models');
    }
}
