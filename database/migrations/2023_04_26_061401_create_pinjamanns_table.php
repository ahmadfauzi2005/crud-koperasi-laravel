<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *http://127.0.0.1:8000/type Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjamanns', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('anggota');
            $table->string('angsuran');
            $table->string('petugas');
            $table->timestamps();
            $table->foreign('anggota')->references('nama')->on('customers')->onDelete('RESTRICT');
            $table->foreign('angsuran')->references('nm_angsuran')->on('angsurans')->onDelete('RESTRICT');
            $table->foreign('petugas')->references('nama')->on('officers')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjamanns');
    }
};
