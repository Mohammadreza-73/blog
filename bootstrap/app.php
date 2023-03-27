<?php

use App\Core\App;
use App\Core\Database;
use App\Core\Container;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require config_path('database');

    return new Database($config);
});

App::setContainer($container);
// var_dump(App::container());