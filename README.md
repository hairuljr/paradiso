# Laravel 8 + Skote + Laravel UI + Livewire
we love Skote Admin Template and Laravel 8 let's make them love each other.

[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/nyancodeid/laravel-8-stisla-jetstream/issues)

## What inside?
- Laravel ^8.6 - [laravel.com/docs/8.x](https://laravel.com/docs/8.x)
- Laravel UI ^3.x - [Laravel UI](https://github.com/laravel/ui)
- Livewire ^2.0 - [laravel-livewire.com](https://laravel-livewire.com)
- Skote Admin Template ^3.3.X - [Skote](https://themesbrand.com/skote/layouts/index.html)

## What next?
After clone or download this repository, next step is install all dependency required by laravel and laravel-mix.

```shell
# create copy of .env
$ cp .env.example .env
# sett your .env (DB, etc)
# install composer-dependency
$ composer install
```

Before we start web server make sure we already generate app key, configure `.env` file and do migration.

```shell
# generate laravel app key
$ php artisan key:generate
# laravel migrate
$ php artisan migrate
```
