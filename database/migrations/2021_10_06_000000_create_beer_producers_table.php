<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeerProducersTable extends Migration
{
    private const BEER_PODUCERS = "beer_producers";
    private const BEER_TYPES = "beer_types";
    private const BEER = "beer";
    /**
     *
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create(self::BEER_PODUCERS, function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create(self::BEER_TYPES, function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create(self::BEER, function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name');
            $table->unsignedInteger('company');
            $table->unsignedInteger('type');
            $table->string('description')->nullable();
            $table->foreign('company')->references('id')->on(self::BEER_PODUCERS)->onDelete('cascade');
            $table->foreign('type')->references('id')->on(self::BEER_TYPES)->onDelete('cascade');
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
        Schema::dropIfExists(self::BEER_PODUCERS);
        Schema::dropIfExists(self::BEER_TYPES);
        Schema::dropIfExists(self::BEER);
    }
}
