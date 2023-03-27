<?php

use App\Core\App;
use App\Core\Database;
use App\Core\Container;

$container = new Container();

$container->bind('Core\Database', function () {
    return new Database(config('database'));
});

App::setContainer($container);
