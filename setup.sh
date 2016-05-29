#!/bin/sh

composer install
npm install
sqlite3 database/database.sqlite ""
php artisan migrate
php artisan db:seed

if [[ $1 == "watch" ]]; then
  npm run dev
  php artisan serve
else
  npm run prod
fi
