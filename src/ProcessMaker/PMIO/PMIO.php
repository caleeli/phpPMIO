<?php
namespace ProcessMaker\PMIO;

class PMIO extends ApiBase
{
    protected static $self;
    protected static $instances = [];

    protected static function singleton($class)
    {
        if (!isset(static::$instances[$class])) {
            static::$instances[$class] = new $class(static::getInstance());
        }
        return static::$instances[$class];
    }

    /**
     * @return PMIO
     */
    public static function getInstance()
    {
        if (!isset(static::$self)) {
            static::$self = new static;
        }
        return static::$self;
    }
    
    
    /**
     * @return Users
     */
    public static function users()
    {
        return static::singleton(Users::class);
    }
    
    /**
     * @return ProcessImport
     */
    public static function processImport()
    {
        return static::singleton(ProcessImport::class);
    }
}
