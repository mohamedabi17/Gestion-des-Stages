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
        Schema::create('evaluer_entreprise', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('commentaire');
            $table->timestamps();

                  $table->unsignedBigInteger('entreprise_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "entreprise" table
            $table->foreign('entreprise_id')
                ->references('entreprise_id')  // Use the correct column name in "entreprise" table
                ->on('entreprises')
                ->onDelete('CASCADE');

            $table->unsignedBigInteger('user_id'); // Ensure it's unsigned

            // Foreign key constraint referencing the existing "entreprise" table
            $table->foreign('user_id')
                ->references('id')  // Use the correct column name in "entreprise" table
                ->on('users')
                ->onDelete('CASCADE');



        });

        

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluer_entreprise');
    }
};
