<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->id('id_diem');
            $table->bigInteger('id_sinhvien')->unsigned()->index();
            $table->bigInteger('id_hocky')->unsigned()->index();
            $table->bigInteger('id_nd')->unsigned()->index();
            $table->foreign('id_sinhvien')->references('id_sinhvien')->on('sinhviens')->onDelete('cascade');
            $table->foreign('id_hocky')->references('id_hocky')->on('hockys')->onDelete('cascade');
            $table->foreign('id_nd')->references('id_nd')->on('noidungs')->onDelete('cascade');
            $table->integer('diem_sv');
            $table->integer('diem_gv');
            $table->integer('diem_hd');
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
        Schema::dropIfExists('diems');
    }
}
