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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nip', length: '16');
            $table->string('email', length: '100')->unique();
            $table->text('password');
            $table->string('nama', length: '100');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_hp', length: '15');
            $table->text('alamat');
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
        Schema::dropIfExists('users');
    }
};
