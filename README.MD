# Memory.pro - API

![version](https://img.shields.io/badge/version-0.0.02%20(sketch)-red)

> You're going to become a memory master!

## Installation

- Clone the repository
- Install back dependencies with `composer install`
- Copy file `.env.example` in `.env` and add following information:
  - Database credentials (`DB_HOST`, `DB_PORT`, ...)
  - Application url (`APP_URL`). Either virtual host address if you configure one, either address form the command `php artisan serve`
- Generate application key with `php artisan key:generate`
- Launch migrations with `php artisan migrate`
- Launch laravel pasport key generation with `php artisan passport:install`

## API Routes

### Auth

#### /auth/register

- Method: POST
- data:
  - username
  - email
  - first_name
  - last_name
  - birth

#### /auth/login

- Method: POST
- data:
  - usernameOrEmail
  - password

#### /auth/register-and-login (post)

- Method: POST
- data: as /auth/register

#### /auth/logout (get)

- Method: GET
