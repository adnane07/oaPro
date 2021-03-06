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
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->boolean('isConfirmed')->default(false);
            $table->string('name');
            $table->string('tel')->nullable();
            $table->string('email');
            $table->date('dateReservation');
            $table->string('heureDepart');
            $table->string('heureFin');
            $table->string('idTerrain');
            $table->string('planningId');
            // $table->foreignId('planningId')
            //       ->constrained('planning')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');

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
        Schema::dropIfExists('reservation');
    }
};
