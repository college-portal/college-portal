# College Portal

[![Codeship Status for college-portal/college-portal](https://app.codeship.com/projects/9f257b40-6409-0136-9628-0a6e2570381d/status?branch=master)](https://app.codeship.com/projects/297074)

An open source Rest API for a modern online portal for tertiary institutions including

- Universities
- Polytechnics
- Colleges of Education

## Status

- Under Active Development

## Setup

- Clone this repository
- Be sure to have Laravel Development Environment [setup on your system](https://laravel.com/docs/5.6/installation)
- Copy the [.env.example](./.env.example) file to a .env file and update its values
- Create an App Key with `php artisan key:generate`
- Run `composer update` to install dependencies
- To use the image upload feature
  - Create a cloudinary account
  - Fill the CLOUDINARY_* fields in .env
- Create a MySQL, PostgreSQL or SQLite DB and connect it via the .env file
- Add the migrations to the DB by running `php artisan migrate`
- To seed your DB with test data, run `php artisan db:seed`
- To serve the application, run `php artisan serve`

## Rest API Documentation

The documentation exists [here](./public/docs/source/index.md).

## Technologies

- PHP (Laravel)
- MySQL

## Contribution Guide

See our [guide](CONTRIBUTING.md) for contributors.

## A Peek (ER Diagram)

![image](https://user-images.githubusercontent.com/11996508/42640287-e33dfc6a-85e9-11e8-91f6-38eb670f8278.png)