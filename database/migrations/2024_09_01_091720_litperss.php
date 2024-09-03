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
        Schema::create('litperss', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('pkt', 50);
            $table->string('hasil', 255);
            $table->string('dokumen');
            $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('litperss');
    }
};
