<?php


use App\App;
use Framework\DBAdapter\MySQL;

error_reporting(-1); // включить все виды ошибок, включая  E_STRICT
ini_set('display_errors', 'On');  // вывести на экран помимо логов

require_once '../vendor/autoload.php';

$config = include '../config/config.php';
//var_dump($config);
//die;
$app = new App($config);

$app->run();
$mysql = new MySQL();

echo var_dump($_SERVER)

?>

