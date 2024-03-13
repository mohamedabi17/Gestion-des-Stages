<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pilote_de_promotions', function (Blueprint $table) {
            $table->id('pilote_id');
            $table->string('name')->nullable();
            $table->timestamps();

             $table->unsignedBigInteger('user_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "entreprise" table
            $table->foreign('user_id')
                ->references('id')  // Use the correct column name in "entreprise" table
                ->on('users')
                ->onDelete('CASCADE');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pilote_de_promotions');
    }
};
