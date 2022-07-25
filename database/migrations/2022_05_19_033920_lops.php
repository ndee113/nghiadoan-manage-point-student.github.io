<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lops', function (Blueprint $table) {
            $table->id('id_lop');
            $table->string('ten_lop');
            $table->bigInteger('id_khoa')->unsigned()->index();
            $table->bigInteger('id_khoa_hoc')->unsigned()->index();
            $table->foreign('id_khoa')->references('id_khoa')->on('khoas')->onDelete('cascade');
            $table->foreign('id_khoa_hoc')->references('id_khoa_hoc')->on('khoa_hocs')->onDelete('cascade');
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
        Schema::dropIfExists('lops');
    }
}
