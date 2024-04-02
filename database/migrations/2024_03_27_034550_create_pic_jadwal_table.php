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
        Schema::create('pic_jadwal', function (Blueprint $table) {
            $table->id('id_pic_jadwal');
            $table->foreignId('id_user');
            $table->foreignId('id_jadwal');
            $table->foreignId('id_role');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pic_jadwal');
    }
};
