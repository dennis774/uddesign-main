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
        Schema::create('merch_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merch_type_id')->constrained('merch_types')->onDelete('cascade'); // Ensures a valid foreign key
            $table->integer('pcs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merch_details');
    }
};
