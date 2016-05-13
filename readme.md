# Serverside Webscripten 2: Project

> The technology stack in this project is chosen by the exercise; not by myself

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

Toledo as a name is property of KU Leuven.

Haroen Viaene

Apache 2.0
