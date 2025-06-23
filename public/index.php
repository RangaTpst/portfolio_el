<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

$router = require_once __DIR__ . '/../config/routes.php';
$router->dispatch();



