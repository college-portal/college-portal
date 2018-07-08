#!/bin/sh

# This code is used by CodeShip, our CI server, to run and test the project after every push to GitHub.

# We support all major PHP versions. Please see our documentation for a full list.
# https://documentation.codeship.com/basic/languages-frameworks/php/

if [ "$CI_BRANCH" != "gh-pages" ]
then 
    phpenv local 7.2
    # Install extensions via PECL
    #pecl install -f memcache
    # Prepare cache directory and install dependencies
    mkdir -p ./bootstrap/cache
    composer install --no-interaction
    # Prepare the test database
    mysql -e "create database $DB_DATABASE;"
    mysql -e "CREATE USER '$DB_USERNAME'@'localhost' IDENTIFIED BY '$DB_PASSWORD';"
    mysql -e "GRANT ALL PRIVILEGES ON * . * TO '$DB_USERNAME'@'localhost';"
    mysql -e "set global innodb_file_format = 'BARRACUDA';"
    mysql -e "set global innodb_file_per_table = 'ON';"
    mysql -e "set global innodb_large_prefix = 'ON';"
    # create .env file
    touch .env
    echo "APP_ENV=testing">> .env
    echo "APP_DEBUG=true" >> .env
    echo "APP_KEY=" >> .env
    echo "APP_URL=http://localhost:8000" >> .env
    echo "DB_CONNECTION=mysql" >> .env
    echo "DB_HOST=localhost" >> .env
    echo "DB_PORT=3306" >> .env
    echo "DB_DATABASE=$DB_DATABASE" >> .env
    echo "DB_USERNAME=$DB_USERNAME">> .env
    echo "DB_PASSWORD=$DB_PASSWORD" >> .env
    echo "ADMIN_EMAIL=$ADMIN_EMAIL" >> .env
    php artisan key:generate
    php artisan migrate --force
    php artisan db:seed
fi