# Open Laravel Week

> :construction: Projeto em construção :construction:

## Evento
O open lavravel week é um evento promovido pelo canal Beer And Code. Consiste em uma semana de lives onde é desenvolvido um projeto em Laravel.

## Projeto
O projeto desenvolvido foi um sistema em Laravel para consumir uma API de um catálogo de cervejas (PunkAPI).

## Funcionalidades
- [X] Trazer todas as opções de cerveja com filtros
- [X] Exportação em excel
- [X] Enviar arquivo excel exportado por e-mail
- [X] Utilizar jobs para tarefas assincronas

## PunkApi
Foi utilizada a versão 2 da API.

> https://punkapi.com/

Documentação
> https://punkapi.com/documentation/v2

## Laravel Excel
> https://laravel-excel.com/

### Instalação
```
composer require maatwebsite/excel
```

### Criar arquivo para exportação
```
php artisan make:export BeerExport
```

## Rotas

### Retornar cervejas
http://127.0.0.1:8000/beers

### Exportar cervejas
http://127.0.0.1:8000/beers/export

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

## Criar request
```
php artisan make:request BeerRequest
```

## Criar model, controller e migration
```
php artisan make:model Export -mr
```

## Criar uma factory
```
php artisan make:factory MealFactory
```

## Criar um seeder
```
php artisan make:seed MealSeeder
```

> https://fakerphp.github.io/third-party/

> https://github.com/jzonta/FakerRestaurant

Biblioteca para gerar opções de comida e bebida.

```
composer require jzonta/faker-restaurant
```

### Limpar banco e apagar seeder
```
php artisan migrate:fresh --seed
```

## Criar classe pra envio de e-mail
```
php artisan make:mail ExportEmail
```

## Mailtrap

> https://mailtrap.io/

## Criar Job
```
php artisan make:job ExportJob
```

## Tinker 
É um REPL (loop de leitura-avaliação-impressão). O REPL permite que os usuários interajam com o aplicativo por meio da linha de comando. É comumente usado para interação com o Eloquent ORM, trabalhos, eventos e muito mais.

```
php artisan tinker
```

## Trabalhando com fila
Mudar no .env
```
QUEUE_CONNECTION=redis
```

```
php artisan queue:work
```













