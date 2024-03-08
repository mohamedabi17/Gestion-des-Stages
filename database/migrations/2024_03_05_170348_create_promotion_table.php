<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
                Schema::create('promotions', function (Blueprint $table) {
                $table->id();
                $table->string('nom_promotion');
                $table->unsignedBigInteger('pilote_id')->nullable(); // Ensure it's unsigned

                // Foreign key constraint referencing the existing "pilote_de_promotions" table
                $table->foreign('pilote_id')
                    ->references('pilote_id') // Reference the primary key of "pilote_de_promotions" table
                    ->on('pilote_de_promotions')
                    ->onDelete('SET NULL');

                $table->timestamps();
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
