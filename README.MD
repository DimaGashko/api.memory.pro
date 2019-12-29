# Memory.pro - API

![version](https://img.shields.io/badge/version-0.0.02%20(sketch)-145a46)

> You're going to become a memory master!

## Installation

- Clone the repository
- Install back dependencies with `composer install`
- Copy file `.env.example` in `.env` and add following information:
  - Database credentials (`DB_HOST`, `DB_PORT`, ...)
  - Application url (`APP_URL`). Either virtual host address if you configure one, either address form the command `php artisan serve`
- Generate application key with `php artisan key:generate`
- Launch migrations with `php artisan migrate`
- Launch laravel passport key generation with `php artisan passport:install`

## API Routes

```text
get:   /user

get    /users
get    /users/{username}

get    /rand/words/{len}
get    /rand/images/{len}

get    /results/numbers/{id}
get    /results/words/{id}
get    /results/images/{id}

post   /results/numbers/
post   /results/words
post   /results/images

put    /results/numbers
put    /results/words
put    /results/images
```

## Lang & techs

- PHP
- Laravel
- Laravel Passport
- MySql
- Vue
- SSH

## Other

Frontend repo: [github.com/DimaGashko/frontend.memory.pro](https://github.com/DimaGashko/frontend.memory.pro)
