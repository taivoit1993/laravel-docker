### Setup ENVIROMENT
- docker-compose up -d

### Setup MySQL
- First: access docker by command `docker exec -it mysql bash`
- From commandline run `mysql -u root -p`
- Enter password: `passsword`
- Create new DB: `CREATE DATABASE DB;`
- Exit command line: `quit`

### Setup Laravel
- First: access docker Laravel
- run: `cp .env.example .env`
- run: `composer install`
- run `php artisan passport:install`
- config .env 
      `DB_CONNECTION=mysql
        DB_HOST=mysql
      DB_PORT=3306
      DB_DATABASE=db
      DB_USERNAME=root
      DB_PASSWORD=password`
- clear config `php artisan config:cache`
- show all route: `php artisan route:list`