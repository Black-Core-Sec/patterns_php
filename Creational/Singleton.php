<?php


namespace Creational;


use Exception;

/**
 * The Singleton class provides the `GetInstance` method, which behaves like
 * alternative constructor and allows customers to get the same
 * instance of the class with every call.
 */
class Singleton
{
    /**
     * The Singleton object is stored in the static field of the class. This field is an array, so
     * how we let our Singleton have subclasses. All the elements of this
     * Arrays will be instances of the secret subclasses of the Singleton.
     */
    private static $instances = [];

    /**
     * To prevent
     * creating an object through the new operator.
     */
    protected function __construct() { }

    /**
     * To prevent cloning.
     */
    protected function __clone() { }

    /**
     * To prevent recovery from strings.
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }

    /**
     * This is a static method that controls access to an instance of a Singleton. At
     * the first run, it creates an instance of a Singleton and places it in
     * static field. On subsequent launches, it returns an object to the client,
     * stored in a static field.
     */
    public static function getInstance(): Singleton
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static;
        }

        return self::$instances[$cls];
    }
}