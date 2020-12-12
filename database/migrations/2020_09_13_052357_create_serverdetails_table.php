<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serverdetails', function (Blueprint $table) {
            $table->id();
            $table->string('Physial_or_Virtual');
            $table->string('availble_vm');
            $table->string('virtual_serv_token');
            $table->string('Serial_No');
            $table->string('Asset_No');
            $table->string('serv_location');
            $table->date('Purchase_year');
            $table->string('Rack_No');
            $table->string('Rack_unit_No');
            $table->string('product_and_modal');
            $table->string('vir_name');
            $table->string('ip_address');
            $table->string('vir_ipadd');
            $table->string('OS');
            $table->string('vir_os');
            $table->string('Applications');
            $table->string('vir_application');
            $table->string('py_spec_processor');
            $table->string('py_spec_ram');
            $table->string('Created_user_id');
            $table->string('Created_by');
            $table->boolean('power_status')->default(1);
            $table->boolean('Status')->default(1);
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
        Schema::dropIfExists('serverdetails');
    }
}
