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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ProductName")->unique();
            $table->integer("PriceBeforeDiscount")->nullable();
            $table->integer("Discount")->nullable();
            $table->integer("PriceAfterDiscount")->nullable();
            $table->text("image");
            $table->integer("quantity")->nullable();
          
  

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
