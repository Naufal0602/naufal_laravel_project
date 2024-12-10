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
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable(); // Kolom untuk gambar
            $table->string('judul'); // Kolom untuk judul
            $table->string('sub_subjudul'); // Kolom untuk sub-subjudul
            $table->string('work'); // Kolom untuk work
            $table->string('sub_work')->nullable(); // Kolom untuk sub-work
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
