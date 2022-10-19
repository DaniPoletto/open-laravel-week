<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        Http::macro('punkapi', function(){
            //nome do arquivo.chave do array q quer acessar
            return Http::acceptJson()
                ->baseUrl(config('punkapi.url'))
                ->retry(3, 100);//quantas vezes vai tentar e vai esperar 100 milesegundos de uma tentativa pra outra

            // return Http::withHeaders([
            //     'accept' => 'aplplication/json'
            // ])->baseUrl(config('punkapi.url'));

            // return Http::withToken('token', 'prefixo do token, por padrão Bearer')->baseUrl(config('punkapi.url'));
        });
    }
}
