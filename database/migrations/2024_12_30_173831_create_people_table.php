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
        Schema::create('people', function (Blueprint $table) {
            //Colonnes
            $table->id();
            $table->bigInteger('created_by')->unsigned()->nullable(false);
            $table->string('first_name', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->string('last_name', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->string('birth_name', 255)->collation('utf8mb4_unicode_ci')->nullable(true); // varchar n'est pas accepté par Laravel
            $table->string('middle_names', 255)->collation('utf8mb4_unicode_ci')->nullable(true);
            $table->date('date_of_birth')->nullable(true);
            $table->timestamps();

            // Colonnes indexées (ID est indexé par défaut)
            $table->index('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
