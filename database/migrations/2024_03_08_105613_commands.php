<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  
        public function up(): void
        {
          Schema::create('Commands',function($table){
            $table->id('idCommand');
            $table->unsignedBigInteger('idProduct');
            $table->unsignedBigInteger('idUser');
            $table->string('quantitePro');
            $table->date('dateCommand');
            $table->string('statut');
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idProduct')->references('idProduct')->on('Products');
            $table->timestamps();
          });}
  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Commands');
    }
};
