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
        Schema::create('dokumen_pelamar', function (Blueprint $table) {
            $table->id('id_dokumen_pelamar');
            $table->integer('id_pelamar');
            $table->string('name', 100);
            $table->string('type', 10);
            $table->float('size', 8, 2);
            $table->text('path');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_pelamar');
    }
};
