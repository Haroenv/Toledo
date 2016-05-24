#/bin/sh

composer install
npm install
sqlite3 database/database.sqlite ""
npm run dev
php artisan migrate
php artisan db:seed
# php artisan serve
