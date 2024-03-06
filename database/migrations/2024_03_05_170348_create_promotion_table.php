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
            // Add other columns as needed
            $table->timestamps();

            $table->unsignedBigInteger('etudiant_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "etudiant" table
            $table->foreign('etudiant_id')
                ->references('etudiant_id') // Reference the primary key of "etudiant" table
                ->on('etudiants')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('pilote_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "etudiant" table (assuming "pilote" represents students)
            $table->foreign('pilote_id')
                ->references('pilote_id') // Reference the primary key of "etudiant" table
                ->on('pilote_de_promotions')
                ->onDelete('CASCADE');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
