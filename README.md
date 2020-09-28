## About Quotes
Created a webpage that loads quotes from the database. I used laravel's factory pattern and db seeder to seed 40 quotes into the database.
I added buttons to the frontend to populate and to empty the database from there.

I used LiveWire to show off the latest technology to quicky build fullstack applications. LiveWire takes care of the communicaitons between the front-end and the back-end. 
The registered variables are immediately available on the front-end and their (back-end) status will autoatically sync from the front-end if there were any changes.

I created tests, that can be run with phpunit.

I used dispatchBrowserEvent for sending notifications and the quotes to the modals.

## Stack
PHP 7.4
Laravel 8.6.0
Laravel - LiveWire 2.0
AlpineJS
Tailwind UI
SQLite
Phpunit 8.5.2

## Installation

git clone git@github.com:levipeto/quotes.git
cd quotes
composer install
cp .env.example .env
touch database/database.sqlite
!!! "copy database.sqlite file's absolute path into the .env" like DB_DATABASE=absolutpath/database/database.sqlite
php artisan migrate
