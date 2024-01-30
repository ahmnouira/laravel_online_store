#

##  Missing parts

* ch10

## Serve

```sh
php artisan serve
```

## Running PHP_CodeSniffer

```sh
./vendor/bin/phpcs
# fix issues
./vendor/bin/phpcbf
```

* PHP_CodeSniffer does not work well with blade files. A formatting Visual Studio Code plugin called Format HTML in PHP can help you to format your Blade views.

* PHP_CodeSniffer does not automatically fix all errors. For example, there is a standard of using `camelCase` coding style to name methods.

## sqlite configuration

```txt
DB_CONNECTION=sqlite
DB_DATABASE=db.sqlite3
```

```sh
echo "sqlite:///`pwd`/db.sqlite3"
echo $DATABASE_URL
export DATABASE_URL="sqlite:///`pwd`/db.sqlite3"
export DATABASE_URL="" # reset
# or in .env
DB_NAME=db.sqlite3
DATABASE_URL="sqlite:///`pwd`/${DB_NAME}"
DB_DATABASE="${DB_NAME}"
```

```sh
cp .env.example .env
```

## Product migration

```sh
php artisan make:migration create_products_table
```

```sh
php artisan migrate
```

```sql
sqlite3 db.sqlite3
.schema --indent products
.schema --indent users

select * FROM products # gives error
SELECT id FROM products;
SELECT description FROM products;
```

## Inserting products

```sql
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'TV', 'Best TV', 'game.jpeg', '1000', '2021-10-01 00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'iPhone', 'Best iPhone', 'safe.png', '999', '2021-10- 01 00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'Chromecast', 'Best Chromecast', 'submarine.png', '30', '2021-10-01 00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'Glasses', 'Best Glasses', 'game.jpeg', '100', '2021- 10-01 00:00:00', '2021-10-01 00:00:00');
```

## Creating Product model

```sh
php artisan make:model Product
```

## APP_KEY

```sh
php artisan key:generate --show
# .env
APP_KEY=base64:cjB8wJHrR2lmUrQzNbiQ75YWjoJRh9dxlJIZOayj0jI=
```

## Update

```sql
UPDATE products SET image = "game.jpeg" WHERE image = "game.png";
SELECT * FROM products;
```

## Storage

To make files accessible from the web, we must create a "symbolic link" from public/storage to storage/app/public.

```sh
php artisan storage:link
   INFO  The [public/storage] link has been connected to [storage/app/public].  
```

* The users only can access files located inside `public/` folder. The rest of folders and files cannot be accessed.

## Login system

Generate the frontend scaffolding and the login system.

```sh
composer require laravel/ui
php artisan ui bootstrap --auth
   WARN  Please run [npm install && npm run dev] to compile your fresh scaffolding.  
```

## Alter user migration

```sh
php artisan make:migration alter_users_table
```

Rollback: delete all the data also  !!!

```sh
php artisan migrate:rollback
```

```sql
sqlite3 db.sqlite3
.schema --indent users

SELECT * FROM users;
```

## Copy public img to storage

```sh
cp -R  public/img/*.{jpeg,png} storage/app/public
```

## Laravel Tinker

```sh
php artisan tinker
```

```php
$user = new App\Models\User(); 
$user->setName('Ahmed Nouira');
$user->setEmail('ahmnouira@gmail.com');
$user->setPassword(bcrypt('passwordVerySecret)'))
$user->seBalance(5000)
$user->setRole('admin'); 
$user->save(); 
exit; 
```

```sh
$products = App\Models\Product::all()

= Illuminate\Database\Eloquent\Collection {#7201
    all: [
      App\Models\Product {#7203
        id: 1,
        name: "TV",
        description: "Best TV",
        image: "game.jpeg",
        price: 1000,
        created_at: "2021-10-01 00:00:00",
        updated_at: "2021-10-01 00:00:00",
      },
      App\Models\Product {#7204
        id: 2,
        name: "iPhone",
        description: "Best iPhone",
        image: "safe.png",
        price: 999,
        created_at: "2021-10- 01 00:00:00",
        updated_at: "2021-10-01 00:00:00",
      },
      App\Models\Product {#7205
        id: 3,
        name: "Chromecast",
        description: "Best Chromecast",
        image: "submarine.png",
        price: 30,
        created_at: "2021-10-01 00:00:00",
        updated_at: "2021-10-01 00:00:00",
      },
      App\Models\Product {#7206
        id: 4,
        name: "Glasses",
        description: "Best Glasses",
        image: "game.jpeg",
        price: 100,
        created_at: "2021- 10-01 00:00:00",
        updated_at: "2021-10-01 00:00:00",
      },
    ],
  }
```

## AdminAuthMiddleware

```sh
php artisan make:middleware AdminAuthMiddleware
```
