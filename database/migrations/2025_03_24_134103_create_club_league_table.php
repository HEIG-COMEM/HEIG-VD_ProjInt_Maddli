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
        Schema::create('club_league', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('league_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unique(['club_id', 'league_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_league');
    }
};
