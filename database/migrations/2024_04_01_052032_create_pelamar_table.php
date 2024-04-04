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
        Schema::create('pelamar', function (Blueprint $table) {
            $table->increments('id_pelamar');
            $table->string('no_ktp', 16);
            $table->string('nama_pelamar', 100);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('email', 100);
            $table->text('password');
            $table->string('no_hp', 15);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('foto');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamar');
    }
};
