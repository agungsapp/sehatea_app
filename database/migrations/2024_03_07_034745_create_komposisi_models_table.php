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
        Schema::create('komposisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_bahan');
            $table->integer('takaran');
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('CASCADE');
            $table->foreign('id_bahan')->references('id')->on('bahan')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komposisi');
    }
};
