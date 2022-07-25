<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoidungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noidungs', function (Blueprint $table) {
            $table->id('id_nd');
            $table->bigInteger('id_tc')->unsigned()->index();
            $table->foreign('id_tc')->references('id_tc')->on('tieuchis')->onDelete('cascade');
            $table->string('noidung');
            $table->integer('diem_tc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noidungs');
    }
}
