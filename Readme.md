# QA application

QA web application like StackOverflow.

## Purpose

Learn how to build web applications with PHP, Laravel and Vue.js.

## Notes for me :)

It's a list of notes about tools, programs, frameworks, code and etc. that I'm using (and learning) during the app development.

### - Laravel

PHP framework for web development.

Its architecture is based on MVC and it has lots of built-in tools.

### - Composer

Dependency manager for PHP.

### - Artisan

Artisan is a tool to build/generate artifacts and help in the development of php and Laravel applications.

#### Create model:
```
> php artisan make:model <ModelName>
```
Use `-m` or `--migration` to create a migration in the same command.

#### Create factory model:
```
> php artisan make:factory <FactoryModelName>
```

A factory is a feature that helps building fake data/models.

#### Execute migration:
```
> php artisan migrate
```

#### Recreate the database:
```
> php artisan migrate:fresh
```

Use `--seed` to use the seed from DatabaseSeeder.php class

---

The application is being built during the Fullstack web development with Laravel and Vue.js course.

https://www.udemy.com/laravel-vuejs-fullstack-web-development/