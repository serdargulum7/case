<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id()->from(140000);
            $table->unsignedInteger('person_id');
            $table->string('address', 255)->nullable();
            $table->string('postcode', 10)->commit('Can be nine digits plus a hyphen')->nullable();
            $table->string('city_name', 100);
            $table->string('country_name', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
