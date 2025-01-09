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
            $table->string('name'); // Nama produk
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict'); // Kategori produk
            $table->text('description'); // Deskripsi lengkap
            $table->string('short_description', 255); // Deskripsi singkat
            $table->string('wood_type'); // Jenis kayu
            $table->decimal('price', 10, 2); // Harga normal
            $table->string('thumb_image');
            $table->decimal('discount_price', 10, 2)->nullable(); // Harga diskon
            $table->timestamps();
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
