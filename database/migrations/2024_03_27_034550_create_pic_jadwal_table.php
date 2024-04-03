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
            $table->integer('id_user');
            $table->integer('id_jadwal');
            $table->integer('id_role');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable(true);
            $table->timestamp('deleted_at')->nullable(true);
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
