<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
          // Create the "offre_de_stage" table with the foreign key
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('duree');
            $table->unsignedBigInteger('entreprise_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "entreprise" table
            $table->foreign('entreprise_id')
                ->references('entreprise_id')  // Use the correct column name in "entreprise" table
                ->on('entreprises')
                ->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
