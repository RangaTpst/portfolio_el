<?php
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];

// Ex: /portfolio_elisa/public
$scriptName = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
$basePath = rtrim($scriptName, '/') . '/';

define('BASE_URL', $protocol . $host . $basePath);
