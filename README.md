# Tōku

Tōku is a CRUD Laravel 5 blogging application that supports user authentication. Users are allowed to register with a username and password. Once logged in, users can create posts which can consist of a title, the content (text) of their post, and an image if they desire. Users can also edit and delete their posts. However, users can only delete posts that belong to them.


## Setup

In order to set up the project to run on your machine, you will need to do the following:

1. Clone the project into a directory of your choice on your machine.
2. Ensure that Composer and Node.js are installed on your machine (https://getcomposer.org/ & https://nodejs.org/en/).
3. Run `composer global require laravel/installer`
4. Setup a database for use with the application and edit the `.env` file to match your database credentials.
5. Run `composer install` and `npm install` in the root directory of the project.
6. Run `php artisan migrate` to allow the Laravel migration files to create the correct tables
in your database.
7. Run `php artisan serve` to view the project at `localhost:8000`

Laravel set-up instructions and documentation: https://laravel.com/docs/5.8/installation
