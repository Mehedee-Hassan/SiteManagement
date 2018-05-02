<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('description');
            $table->text('contractor');
            $table->text('work_place');
            $table->integer('mason');
            $table->integer('labour');
            $table->text('remark');


            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->integer('port_id');
            $table->foreign('port_id')->references('id')->on('ports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
