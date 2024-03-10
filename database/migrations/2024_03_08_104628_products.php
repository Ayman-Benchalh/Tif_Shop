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
        Schema::create('Products',function($table){
            $table->id('idProduct');
            $table->string('nameProd');
            $table->string('desination');
            $table->string('prix');
            $table->timestamps();
          });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Products');
    }
};
