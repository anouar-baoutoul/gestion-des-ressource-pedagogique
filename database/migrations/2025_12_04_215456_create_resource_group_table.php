<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
    Schema::create('resource_group', function (Blueprint $table) {
    $table->id();
    $table->foreignId('resource_id')->constrained('ressources')->onDelete('cascade');
    $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('resource_group');
    }
};
