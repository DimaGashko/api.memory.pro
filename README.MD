# Memory.pro - API
  
![version](https://img.shields.io/badge/version-0.0.02%20(sketch)-red)

> You're going to become a memory master!

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
