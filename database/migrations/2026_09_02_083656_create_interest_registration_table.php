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
        Schema::create('interest_registration', function (Blueprint $table) {
            $table->foreignId('interest_id')->constrained();
            $table->foreignId('registration_id')->constrained();
            $table->unique(['interest_id', 'registration_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interest_registration');
    }
};
