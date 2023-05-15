<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();
            $table->string('nm_angsuran')->index();
            $table->string('jenis');
            $table->timestamps();
            $table->foreign('jenis')->references('jenis')->on('types')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angsurans');
    }
};
