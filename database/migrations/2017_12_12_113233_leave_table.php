<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unsigned();
            $table->integer('total_leave')->nullable();
            $table->string('description')->nullable();
            $table->string('leave_from',50)->nullable();
            $table->string('leave_to',50)->nullable();
            $table->integer('status')->default('0');
            $table->string('approved_date',50)->nullable();
            $table->integer('approved_by')->nullable();
            $table->timestamps();
            $table->foreign('emp_id')->references('id')->on('employee')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave');
    }
}
