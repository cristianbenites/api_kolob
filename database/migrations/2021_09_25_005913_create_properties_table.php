<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('district');
            $table->string('street');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('city');
            $table->string('uf', 2);
            $table->integer('bedrooms')->nullable();
            $table->integer('suites')->nullable();
            $table->integer('living_rooms')->nullable();
            $table->integer('kitchens')->nullable();
            $table->boolean('room_kitchen_combined')->default(0);
            $table->integer('parking_spaces')->nullable();
            $table->decimal('building_area', 8,2)->nullable();
            $table->decimal('total_area', 8,2)->nullable();
            $table->enum('property_type', ['aluguel', 'venda', 'compra']);
            $table->decimal('property_full_price', 10,2)->nullable();
            $table->decimal('property_rental_price', 10,2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
