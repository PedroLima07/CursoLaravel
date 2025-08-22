<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->unsignedBigInteger('category_id')->after('description'); // cria a coluna category_id
        $table->foreign('category_id')             // transforma category_id em chave estrangeira
              ->references('id')                   // que faz referência à coluna id
              ->on('products')                     // na tabela products (provavelmente deveria ser categories!)
              ->onDelete('cascade')                // se o "pai" for deletado, os filhos também
              ->onUpdate('cascade');               // se o id do "pai" mudar, atualiza nos filhos
    });
}


    
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
