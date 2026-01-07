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
    Schema::create('activity_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained(); // Siapa pelakunya [cite: 15]
        $table->string('action');      // Jenis Aksi (Create/Update/Delete) [cite: 15]
        $table->text('description');   // Penjelasan detail aksi [cite: 15, 16]
        $table->timestamps();          // Mencatat waktu otomatis [cite: 15]
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
