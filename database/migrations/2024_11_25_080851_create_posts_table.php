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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->text('content');
            $table->enum('komoditas', [
                'Padi',
                'Jagung',
                'Kedelai',
                'Kelapa Sawit',
                'Kopi',
                'Kakao',
                'Tebu',
                'Karet',
                'Cengkeh',
                'Lada',
                'Kayu Manis',
                'Ikan Tuna',
                'Ikan Cakalang',
                'Udang',
                'Rumput Laut',
                'Minyak Kelapa',
                'Gas Alam',
                'Batu Bara',
                'Nikel',
                'Timah',
                'Emas',
                'Bauksit',
            ]);
            $table->string('image');
            $table->integer('qty');
            $table->enum('unit', ['kg', 'kwt', 'ton']);
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
