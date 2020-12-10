<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->string('server_type');
            $table->string('Serial_no');
            $table->string('Asset_no');
            $table->string('Rack_no');
            $table->string('Rack_unit_No');
            $table->string('product_and_modal');
            $table->string('status');
            $table->string('remark');
            $table->string('update_user_id');
            $table->string('update_user_name');
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
        Schema::dropIfExists('followups');
    }
}
