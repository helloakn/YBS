<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusLineRoute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bus_Line_Route', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->integer('bus_line_id');
            $table->integer('bus_stop_id');
            $table->integer('quee_no');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bus_Line_Route');
    }
}
