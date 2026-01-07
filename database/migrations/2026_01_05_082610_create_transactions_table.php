<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('package_name');
            $table->integer('passenger_count');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('transportation');
            $table->boolean('use_guide')->default(false);
            $table->text('notes')->nullable();
            $table->decimal('total_price', 15, 2)->default(0); // Menyimpan harga
            $table->string('status')->default('Pending'); // Pending, Success, Cancel
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};