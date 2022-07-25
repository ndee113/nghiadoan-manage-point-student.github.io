<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Giaoviens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaoviens', function (Blueprint $table) {
            $table->id('id_gv');
            $table->string('ten_gv');
            $table->string('email');
            $table->string('so_dt', 12);
            $table->string('password');
            $table->bigInteger('id_khoa')->unsigned()->index();
            $table->foreign('id_khoa')->references('id_khoa')->on('khoas')->onDelete('cascade');
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
        Schema::dropIfExists('giaoviens');
    }
}
