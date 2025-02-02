<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Etkinlik başlığı
            $table->text('description')->nullable(); // Açıklama (isteğe bağlı)
            $table->dateTime('date'); // Etkinlik tarihi
            $table->string('location'); // Konum
            $table->timestamps(); // created_at ve updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
