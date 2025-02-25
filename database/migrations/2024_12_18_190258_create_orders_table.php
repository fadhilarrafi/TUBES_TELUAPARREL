<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_orders_table.php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Kolom ID (primary key)
            $table->string('name'); // Kolom untuk menyimpan nama pembeli
            $table->string('email'); // Kolom untuk email pembeli
            $table->text('address'); // Kolom untuk alamat pengiriman
            $table->string('credit_card_number'); // Kolom untuk nomor kartu kredit
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders'); // Menghapus tabel orders jika migration di-rollback
    }
};
