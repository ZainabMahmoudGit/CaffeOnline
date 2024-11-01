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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("VideoDescriptionLineOne")->nullable();
            $table->string("VideoDescriptionLineTwo")->nullable();
            $table->string("Title")->nullable();
            $table->string( "header")->nullable();
            $table->string("AboutDescriptionOne")->nullable();
            $table->string("AboutDescriptionTwo")->nullable();
            
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
