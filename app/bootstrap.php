<?php

// Check required libraries and PHP versions
// PHP version 5.5.0 is require due to password_hash function
if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    exit('This app is require minimum version of PHP 5.5.0. You are using ' . PHP_VERSION);
}

// Check and load the config file
if (!file_exists(APP . '/config/config.php')) {
    exit('Ups, it\' looks like you did\'t setup config file. Please follow the instructions in README.md file');
}
require_once APP . '/config/config.php';

// Load global helpers / functions
require_once APP . '/helpers/functions.php';
require_once APP . '/helpers/pdo-debug.php'; // Only for development reasons


// Load application classes
require_once APP.'/helpers/Autoload.php';
$classLoader = new \Versionable\Autoloader\Autoload();
$classLoader->registerNamespace('App', ROOT  );
$classLoader->register();

$app = new \App\Core\Application();


