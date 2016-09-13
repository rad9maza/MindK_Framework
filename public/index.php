<?php


use App\App;

//enable errors
error_reporting(-1);
ini_set('display_errors', 'On');

require_once '../vendor/autoload.php';

$config = include '../config/config.php';

$app = new App($config);

$app->run();
