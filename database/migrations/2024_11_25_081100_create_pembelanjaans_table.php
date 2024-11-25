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
        Schema::create('pembelanjaans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penjual');
            $table->integer('id_pembeli');
            $table->integer('id_post');
            $table->enum('unit', ['kg', 'kwt', 'ton']);
            $table->integer('qty');
            $table->decimal('grandtotal', 10, 2);
            $table->enum('status', ['pending', 'confirmed'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelanjaans');
    }
};
