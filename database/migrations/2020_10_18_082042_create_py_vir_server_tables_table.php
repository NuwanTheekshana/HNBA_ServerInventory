<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePyVirServerTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('py_vir_server_tables', function (Blueprint $table) {
            $table->id();
            $table->string('virtual_serv_token');
            $table->string('vir_machine_name');
            $table->string('virtual_machine_ip');
            $table->string('virtual_machine_os');
            $table->string('virtual_apps');
            $table->string('added_user_id');
            $table->string('added_user');
            $table->string('vir_status');
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
        Schema::dropIfExists('py_vir_server_tables');
    }
}
