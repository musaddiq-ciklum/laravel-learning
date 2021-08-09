# Laravel 8
- It’s an E-Commerce store.
- Admin panel layout is designed by integrating adminlte. It’s managing categories and products with variations. Currently having only one user type with all rights. And in future will implement authorization. 
- Front layout in designed by implementing a free template and is in progress.

## Pre-Requisites
- PHP (Oops)
- Laravel
- Database (Mysql)
- Knowledge of HTML & CSS

## ENV Setup
Install docker following this [video tutorial](https://www.youtube.com/watch?v=rr6AngDpgnM&t=85s) or using the [text version](https://blog.devgenius.io/kickstart-your-laravel-web-app-using-laravel-sail-30276265e588). The project is dockerized is using Laravel sail. [Here](https://laravel.com/docs/8.x/sail#configuring-a-bash-alias) is the link to know more about Laravel sail.<br />
Before running the composer make sure .env file exists in the root directory.<br />

After running migration and UserSeeder one will be able to login with following admin credentials.<br />
url: [http://localhost/admin/login](http://localhost/admin/login)<br />
user: admin@example.com<br />
pass: A1@google<br />

Install [Table Plus](https://tableplus.com/) or use any other tool to view database.
