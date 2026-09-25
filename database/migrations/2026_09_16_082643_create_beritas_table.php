<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->integer('id_berita', true);
            $table->string('judul', 50);
            $table->text('isi');
            $table->date('tanggal');
            $table->string('gambar', 100)->nullable();

            // PERBAIKAN: Ubah referensi foreign key ke tabel 'user' (tanpa s)
            $table->integer('id_user');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
