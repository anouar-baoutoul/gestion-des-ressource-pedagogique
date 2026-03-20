<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();                      // Primary key
            $table->string('code')->unique();  // Code du tag, ex: "TP", "EXAM", "PHP"
            $table->string('label')->nullable(); // Libellé lisible: "Travaux pratiques", "Examen", etc.
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
