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
        Schema::create('posyandus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('child_id')->nullable();
            // $table->enum('jenis_kelamin', ['L', 'P']);
            // $table->integer('Usia');
            $table->decimal('berat_badan', 10, 1)->default(0);
            $table->integer('tinggi_badan');
            $table->integer('lingkaran_kepala');
            $table->enum('NT', ['N', 'T','TP','O','TR','BR',]);
            $table->enum('AK', ['O', 'K','H','A']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posyandus');
    }
};
