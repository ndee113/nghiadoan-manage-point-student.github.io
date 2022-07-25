<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Thongbaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongbaos', function (Blueprint $table) {
            $table->id('id_thongbao');
            $table->bigInteger('id_hocky')->unsigned()->index();
            $table->foreign('id_hocky')->references('id_hocky')->on('hockys')->onDelete('cascade');
            $table->date('ngay_sv');
            $table->date('ngay_ktsv');
            $table->date('ngay_gv');
            $table->date('ngay_ktgv');
            $table->date('ngay_hd');
            $table->date('ngay_kthd');
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
        Schema::dropIfExists('table=thongbaos');
    }
}
