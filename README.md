# About this project
This is a simple laravel project to shorten URLs. The sign up and sign is done using Laravel Auth. Laravel Eloquent ORM,migrate, and middleware are also used. Shorten new URL and update list is done without page refresh (Ajax). There is a copy to clipboard button to copy short URL. Options to delete, edit and customize shortened URL.

## Installation
1. To run this project on your machine, fork it first.
2. Go to the folder application using cd command on your cmd or terminal
3. Run composer install on your cmd or terminal
4. Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
5. Run php artisan key:generate
6. Run php artisan migrate
7. Run php artisan serve
8. Go to the server link localhost:8000 OR 127.0.0.1:8000
