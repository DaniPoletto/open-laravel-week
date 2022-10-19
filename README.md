# Open Laravel Week

## Evento
O open lavravel week é um evento promovido pelo canal Beer And Code. Consiste em uma semana de lives onde é desenvolvido um projeto em Laravel.

## Projeto
O projeto desenvolvido foi um sistema em Laravel para consumir uma API de um catálogo de cervejas (PunkAPI).

## Funcionalidades
- [X] Trazer todas as opções de cerveja com filtros. 

## PunkApi
Foi utilizada a versão 2 da API.

> https://punkapi.com/

Documentação
> https://punkapi.com/documentation/v2

## Instalar Breeze com Vue.js
- Passo 1:
```
composer require laravel/breeze:1.9.2
```

- Passo 2: 
```
php artisan breeze:install vue
```

- Passo 3:
```
npm install
```

- Passo 4:
```
npm run dev
```

- Passo 5:
```
php artisan migrate
```

### Resolução de problemas com laravel mix:
No arquivo package.json alterar a versão:

```
        "laravel-mix": "^6.0.0",
```

E os comandos utilizados:
```
    "scripts": {
        "dev": "npm run development",
        "development": "mix",
        "watch": "mix watch",
        "watch-poll": "mix watch -- --watch-options-poll=1000",
        "hot": "mix watch --hot",
        "prod": "npm run production",
        "production": "mix --production"
    },
```

### Resolução de problemas ao rodas as migrations:
No arquivo /app/Providers/AppServiceProvider.php no método boot acrescentar:

```
Schema::defaultStringLength(191);
```

> Não esquecer de importar a classe Schema


## Criar controller
```
php artisan make:controller BeerController
```

