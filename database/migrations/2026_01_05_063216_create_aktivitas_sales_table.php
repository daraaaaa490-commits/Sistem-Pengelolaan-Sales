<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aktivitas_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_id');
            $table->foreignId('pelanggan_id');
            $table->date('tanggal');
            $table->text('aktivitas');
            $table->enum('hasil', ['berhasil', 'tidak berhasil', 'pending']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aktivitas_sales');
    }
};
