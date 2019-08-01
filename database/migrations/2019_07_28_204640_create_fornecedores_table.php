<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->boolean('is_cnpj')->default(true);
            $table->decimal('cpfj', 14,0)->nullable();
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->decimal('RG', 14,0)->nullable();
            $table->date('nasc')->nullable();

            /* O IDEAL SERIA USAR O CAMPO JSON, MAS A VERSÃO DO MEU BANCO DE DADOS, NÃO PERITE,
             * E COMO ESTOU USANDO UMA VERSÃO INSTÁVEL DO LINUX, NÃO É TÃO SIMPLES DE ATUALIZAR.
             */
            $table->longText('telefone')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
}
