This Project Template is another skeleton [Yii 2](http://www.yiiframework.com/) for creating projects.
The template contains the basic features including user sign in/up and a password recovery page.

[![Latest Stable Version](https://poser.pugx.org/variarty/yii-template/v/stable)](https://packagist.org/packages/variarty/yii-template)
[![Total Downloads](https://poser.pugx.org/variarty/yii-template/downloads)](https://packagist.org/packages/variarty/yii-template)

DIRECTORY STRUCTURE
-------------------

```
app
    assets/              contains application assets such as JavaScript and CSS
    config/              contains application configurations
    controllers/         contains Web controller classes
    forms/               contains Web form classes
    mail/                contains view files for e-mails
    messages/            contains message translation
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains GUI widgets
common
    config/              contains shared configurations
    entities/            contains etities classes
    jobs/                contains jobs (tasks)
    messages/            contains shared messages (core)
    migrations/          contains database migrations
    repositories/        contains classes for working with the database
    services/            contains services classes
console
    commands/            contains console controllers
    config/              contains console configurations
    runtime/             contains files generated during runtime
tests
    runtime/             contains files generated during runtime
    unit/                contains unit tests
vendor/                  contains dependent 3rd-party packages
```

REQUIREMENTS
------------
* PHP >= 7.0
* PHPUnit >= 6.0 (for tests running only)
* Bower
* Npm
* Gulp

INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar create-project --prefer-dist variarty/yii-tempate app
cd app
npm install
bower install
~~~

### Web resources building

[Gulp](https://gulpjs.com/) is used to build web resources (css, js, etc.). [Gulp](https://gulpjs.com/) has several tasks:

```
gulp                help task (get available tasks with description)
gulp less           transform app less to css
gulp js             copy app JS to dist directory
gulp bootstrap      build Twitter Bootstrap with custom overrides
gulp build          run `less`, `js`, `bootstrap` tasks
gulp watch          watch resources src directory and run 'build' task on change
```

### Phing usage

If you have [Phing](https://www.phing.info/) you can run `phing` in your application directory. [Phing](https://www.phing.info/) will run the commands:

~~~
composer install
npm install
bower install
gulp build
~~~

TESTING
-------

Tests are located in `tests` directory. They are developed with [PHPUnit](https://phpunit.de). Tests can be executed by running

```
phpunit
```

The command above will execute unit tests. Now, unit tests are testing only entities.
