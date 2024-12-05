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
        Schema::create('catalogue_statistics', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('impression');
            $table->unsignedBigInteger('click');
            $table->unsignedBigInteger('ctr');
            $table->foreignId('catalogue_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogue_statistics');
    }
};
