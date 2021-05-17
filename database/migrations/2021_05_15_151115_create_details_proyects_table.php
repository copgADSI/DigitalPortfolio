<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsProyectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_proyects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyect_id');
            $table->unsignedBigInteger('technologie_id');
            $table->foreign('proyect_id')->references('id')->on('proyects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('technologie_id')->references('id')->on('technologies')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('details_proyects');
    }
}
