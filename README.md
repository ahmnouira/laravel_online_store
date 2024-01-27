#

##  Missing parts

* ch8
* ch10

## Serve

```sh
php artisan serve
```

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
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'TV', 'Best TV', 'game.png', '1000', '2021-10-01 00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'iPhone', 'Best iPhone', 'safe.png', '999', '2021-10- 01 00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'Chromecast', 'Best Chromecast', 'submarine.png', '30', '2021-10-01 00:00:00', '2021-10-01 00:00:00');
INSERT INTO products (id, name, description, image, price, created_at, updated_at) VALUES (NULL, 'Glasses', 'Best Glasses', 'game.png', '100', '2021- 10-01 00:00:00', '2021-10-01 00:00:00');
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
