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
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->integer('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')
                  ->onDelete('cascade');

                  $table->integer('contacteurId')->unsigned();
$table->foreign('contacteurId')->references('id')->on('users')
                  ->onDelete('cascade');     
            
            
            
                  $table->integer('annonceId')->unsigned();
                  $table->foreign('annonceId')->references('id')->on('annonce')
                        ->onDelete('cascade');
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
        Schema::dropIfExists('message');
    }
};
