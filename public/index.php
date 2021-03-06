<?php
/**
 * Modifica TXY 22:13
 * Modificato da Windows con NetBeans 22:33
 * Git->Clone, poi crea nuovo progetto da existing source ed indicare il clone precedentemente creato.
 * 
 * Questa riga deve dare confilitto
 * 
 * Questa modifica andra in conflitto***su Zend Studio
 * 
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Setup autoloading
require 'init_autoloader.php';

// Run the application!
Zend\Mvc\Application::init(require 'config/application.config.php')->run();
