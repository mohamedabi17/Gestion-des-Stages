<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('code_postal')->nullable();
            $table->string('numero_de_batiment');
            $table->string('ville');
            $table->string('pays');
            // Add other columns as needed
            $table->timestamps();

           $table->unsignedBigInteger('entreprise_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "entreprise" table
            $table->foreign('entreprise_id')
                ->references('entreprise_id')  // Use the correct column name in "entreprise" table
                ->on('entreprises')
                ->onDelete('CASCADE');

        });

        
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
