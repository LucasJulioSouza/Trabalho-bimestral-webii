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
        Schema::create('professores', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->lenght(10,100);
            $table->string('email')->lenght(15,250)->unique();
            $table->integer('siape')->lenght(8,10)->unique();
            $table->unsignedBigInteger('eixo_id')
            ->references('id')->on('eixos');
            $table->boolean('ativo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professores');
    }
};
