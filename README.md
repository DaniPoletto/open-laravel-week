# Open Laravel Week

# Instalar Breeze com Vue.js
```
composer require laravel/breeze:1.9.2
```

```
php artisan breeze:install vue
```

```
npm install
```

```
npm run dev
```

```
php artisan migrate
```

no package.json
```
        "laravel-mix": "^6.0.0",
```

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

No arquivo /app/Providers/AppServiceProvider.php no método boot:

```
Schema::defaultStringLength(191);
```

https://punkapi.com/

# Criar controller
```
php artisan make:controller BeerController
```

