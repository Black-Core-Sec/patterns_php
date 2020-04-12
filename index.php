<?
/**
 * Autoload classes
 */
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include $class . '.php';
});

use Creational\Singleton;

// Create singleton object
$singleton = Singleton::getInstance();
