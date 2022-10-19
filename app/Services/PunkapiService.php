<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PunkapiService
{
    public function getBeers(
        ?string $beer_name = null,
        ?string $food = null,
        ?string $malt = null,
        ?int $ibu_gt = null
    ) {
        $params = array_filter(get_defined_vars());
        
        // [
        //     'beer_name' => $beer_name,
        //     'food' => $food,
        //     'malt' => $malt,
        //     'ibu_gt' => $ibu_gt,
        // ]

        return Http::punkapi()
            // ->retry(3, 100)//quantas vezes vai tentar e vai esperar 100 milesegundos de uma tentativa pra outra
            ->get('/beers', $params) // ?beer_name=$beer_name&...
            ->throw()//lançar excessões
            ->json();//forçar a conversão pra json
    }
}