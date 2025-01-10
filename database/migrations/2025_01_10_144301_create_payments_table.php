<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Relasi ke orders
            $table->string('account_name'); // Nama pemilik rekening pengirim
            $table->string('account_number')->nullable(); // Nomor rekening pengirim
            $table->string('bank_name'); // Nama bank pengirim
            $table->string('payment_proof'); // Lokasi bukti pembayaran
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending'); // Status pembayaran
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
