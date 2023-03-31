<?php

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH . 'bootstrap/app.php';
require_once BASE_PATH . 'routes.php';

$router = (new App\Core\Http\Router)->run();
