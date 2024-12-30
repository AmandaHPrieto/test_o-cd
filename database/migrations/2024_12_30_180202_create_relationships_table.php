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
        Schema::create('relationships', function (Blueprint $table) {
            // Colonnes
            $table->id();
            $table->bigInteger('created_by')->unsigned()->nullable(false);
            $table->bigInteger('parent_id')->unsigned()->nullable(false);
            $table->bigInteger('child_id')->unsigned()->nullable(false);
            $table->timestamps();

            // Colonnes indexées
            $table->index('created_by');
            $table->index('parent_id');
            $table->index('child_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
