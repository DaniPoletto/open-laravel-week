<div align="center">
  <h1>Open Laravel Week</h1>
</div>

![Capa](https://github.com/DaniPoletto/open-laravel-week/blob/main/capa.png)

## Evento
O open lavravel week é um evento promovido pelo canal Beer And Code. Consiste em uma semana de lives onde é desenvolvido um projeto em Laravel.

## Projeto
O projeto desenvolvido foi um sistema em Laravel para consumir uma API de um catálogo de cervejas (PunkAPI).

## Funcionalidades
- [X] Trazer todas as opções de cerveja com filtros
- [X] Exportação em excel
- [X] Enviar arquivo excel exportado por e-mail
- [X] Utilizar jobs para tarefas assincronas
- [X] Utilização do front-end pronto disponibilizado

## Tecnologias utilizadas
- PHP 7.4
- Laravel 8
- PunkApi
- Laravel Excel
- Faker Restaurant
- Mailtrap
- Breeze
- Vue.js
- MySql

## Inicialização
1 - Baixar os arquivos do repositório utilizando git clone

2 - Instalar as dependências do projeto
``` componser install```

3 - Editar o arquivo .env com as credencias do banco de dados

4 - Rodar as migrations
```
php artisan migrate
```

5 - Rodar seeder para criar usuário teste
```
php artisan db:seed --class=AdminUserSeeder
```

5 - Subir o servidor
``` 
php artisan serve
```

## PunkApi
Api de cervejas.

> https://punkapi.com/

Documentação da versão utilizada:
> https://punkapi.com/documentation/v2

## Laravel Excel
Pacote para exportação em excel.
> https://laravel-excel.com/

### Instalação
```
composer require maatwebsite/excel
```

### Criar arquivo para exportação
```
php artisan make:export BeerExport
```

## Faker Restaurant

Biblioteca para gerar opções de comida e bebida.

> https://fakerphp.github.io/third-party/

> https://github.com/jzonta/FakerRestaurant

### Instalação
```
composer require jzonta/faker-restaurant
```

## Mailtrap
Ferramenta de testes com e-mail:
> https://mailtrap.io/

## Tinker 
É um REPL (loop de leitura-avaliação-impressão). O REPL permite que os usuários interajam com o aplicativo por meio da linha de comando. É comumente usado para interação com o Eloquent ORM, trabalhos, eventos e muito mais.

```
php artisan tinker
```

## Breeze com Vue.js
### Instalação
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

### Resolução de problemas ao rodar as migrations:
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

### Limpar banco e apagar seeder
```
php artisan migrate:fresh --seed
```

## Criar classe pra envio de e-mail
```
php artisan make:mail ExportEmail
```

## Criar Job
```
php artisan make:job ExportJob
```

### Rodar todos os jobs que ficaram na fila
```
php artisan queue:work
```













