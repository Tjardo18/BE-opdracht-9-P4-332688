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
        Schema::create('magazijn', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productId')->constrained('product');
            $table->double('verpakkingsEenheid');
            $table->integer('aantalAanwezig')->nullable();
            $table->boolean('isActief')->default(1);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magazijn');
    }
};
