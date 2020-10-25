<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePyVirServeFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('py_vir_serve_followups', function (Blueprint $table) {
            $table->id();
            $table->string('vm_server_token');
            $table->string('vm_server_name');
            $table->string('vm_server_update_user_id');
            $table->string('vm_server_update_user');
            $table->string('vm_server_status');
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
        Schema::dropIfExists('py_vir_serve_followups');
    }
}
