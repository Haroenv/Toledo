# Serverside Webscripten 2: Project

# Setting it up

Fill in the `.env` with an app key, your mailgun settings

```
$ composer install
$ npm install
$ sqlite3 database/database.sqlite ""
$ npm run dev
$ php artisan migrate --seed
$ php artisan serve
```

And it should be open at [localhost:8000](http://localhost:8000).

# Features

- [x] reset password
- [ ] teachers and students
- [ ] announcements
- [ ] file uploads

# License

Haroen Viaene

Apache 2.0
