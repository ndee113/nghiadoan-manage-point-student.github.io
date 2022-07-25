<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GiaovienRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giaovien_roles', function (Blueprint $table) {
            $table->id('id_giaovien_roles');
            $table->bigInteger('giaovien_giaovien_roles')->unsigned();
            $table->bigInteger('roles_id_roles')->unsigned();
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giaovien_roles');
    }
}
