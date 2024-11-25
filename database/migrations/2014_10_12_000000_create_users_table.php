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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->string('image')->nullable();
            $table->string('profession')->nullable();
            $table->enum('region', [
                'Aceh',
                'Sumatera Utara',
                'Sumatera Barat',
                'Riau',
                'Kepulauan Riau',
                'Jambi',
                'Sumatera Selatan',
                'Bangka Belitung',
                'Bengkulu',
                'Lampung',
                'DKI Jakarta',
                'Jawa Barat',
                'Banten',
                'Jawa Tengah',
                'DI Yogyakarta',
                'Jawa Timur',
                'Bali',
                'Nusa Tenggara Barat',
                'Nusa Tenggara Timur',
                'Kalimantan Barat',
                'Kalimantan Tengah',
                'Kalimantan Selatan',
                'Kalimantan Timur',
                'Kalimantan Utara',
                'Sulawesi Utara',
                'Sulawesi Tengah',
                'Sulawesi Selatan',
                'Sulawesi Tenggara',
                'Sulawesi Barat',
                'Gorontalo',
                'Maluku',
                'Maluku Utara',
                'Papua',
                'Papua Barat',
            ])->nullable();
            $table->text('address')->nullable();
            $table->text('contact')->nullable();
            $table->enum('role', ['Petani', 'Dinas', 'Admin'])->default('Petani');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
