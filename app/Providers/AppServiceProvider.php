<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        /** 
         *  O CORRETO ERA TER UM BANCO DE DADOS MAIS ATUALIZADO
         *  E QUE NÃO PRECISASSE DESSA 'GAMBIARRA',
         *  MAS COMO ESTOU USANDO UMA VERSÃO INSTÁVEL DO LINUX
         *  NÃO É TÃO SIMPLES ATUALIZAR ESSE BANCO COM ESSA INSTALAÇÃO.
         *  Versão do servidor: 10.1.37-MariaDB-0+deb9u1 - Debian 9.6
         */

        Schema::defaultStringLength(191);
    }
}
