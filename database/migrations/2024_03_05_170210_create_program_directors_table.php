<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pilote_de_promotion', function (Blueprint $table) {
            $table->id('pilote_id');
            $table->string('name');
            // Add other columns as needed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pilote_de_promotion');
    }
};
