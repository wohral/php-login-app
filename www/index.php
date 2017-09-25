<?php

/**
 * A simple app for login and logout user. When is user authenticated, it's able to to see list of users.
 * Also it is possible to manage user, add, edit, delete.
 * There is a restriction, logged user is not able to delete another logged user.
 *
 * @author Petr Vohralik
 * @link https://github.com/wohral/php-login-app
 * @licence http://opensource.org/licenses/MIT MIT License
 *
 */


// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/web".
define('WWW', ROOT . 'www' . DIRECTORY_SEPARATOR);

include_once __DIR__ . '/../app/bootstrap.php';