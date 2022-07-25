<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhviensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhviens', function (Blueprint $table) {
            $table->id('id_sv');
            $table->string('ho');
            $table->string('ten');
            $table->date('ngaysinh');
            $table->text('diachi');
            $table->string('password');
            $table->bigInteger('id_lop')->unsigned()->index();
            $table->foreign('id_lop')->references('id_lop')->on('lops')->onDelete('cascade');
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
        Schema::dropIfExists('sinhviens');
    }
}
