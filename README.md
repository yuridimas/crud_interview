# SOAL INTERVIEW - ELISOFT

## Requirement

- php 8.0
- mysql

## Install

``` php
composer install
```

``` text
cp .env.example .env
```

## Configuration

```php
php artisan key:generate
```

```env
ENDPOINT_KANALDATA=
```

```php
php artisan migrate --seed
```

## Run Project

Command Terminal

```php
php artisan serve
```

Laragon / Valet

```php
{folder-project}.test
```

## Account

| email | password |
|-|-|
| abyasa@gmail.com | password |

## API Public

```url
{app_url}/api/users/page=1
```
