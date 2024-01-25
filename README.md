#

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
SELECT * FROM products # gives error sqlite3
SELECT id FROM products;
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
