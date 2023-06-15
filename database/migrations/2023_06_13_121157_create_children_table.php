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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mothers_id')->nullable();
            $table->string("nama");
            $table->char('nik',16);
            $table->string("tempat_lahir");
            $table->date('tanggal_lahir');
            $table->string('usia');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->timestamps();
        });
        
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
