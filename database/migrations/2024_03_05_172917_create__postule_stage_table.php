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
        Schema::create('postule_stage', function (Blueprint $table) {
            $table->id();
            $table->binary('cv')->nullable();
            $table->string('lettre_de_motivation');
            $table->timestamps();

             $table->unsignedBigInteger('user_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "entreprise" table
            $table->foreign('user_id')
                ->references('id')  // Use the correct column name in "entreprise" table
                ->on('users')
                ->onDelete('CASCADE');

             $table->unsignedBigInteger('offer_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "entreprise" table
            $table->foreign('offer_id')
                ->references('id')  // Use the correct column name in "entreprise" table
                ->on('offers')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('possede_stage');
    }
};
