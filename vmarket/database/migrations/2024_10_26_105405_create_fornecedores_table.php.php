<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('cnpj') ->unique();
            $table->string('categoria');
            $table->string('uf');
            $table->string('telefone')->nullable();
            $table->timestamps();
        });

        // Este código de inserção pode ser movido para um seeder
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor Teste',
            'email' => 'fornecedor@teste.com',
            'cnpj' => '12345678000100',
            'categoria' => 'Alimentos',
            'uf' => 'SP',
            'telefone' => '11987654321',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
