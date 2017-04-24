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
     * @return Api\Authorization
     */
    public static function authorization()
    {
        return static::singleton(Api\Authorization::class);
    }
    
    /**
     * @return Api\AuthorizedAccessToken
     */
    public static function authorizedAccessToken()
    {
        return static::singleton(Api\AuthorizedAccessToken::class);
    }
    
    /**
     * @return Api\Client
     */
    public static function client()
    {
        return static::singleton(Api\Client::class);
    }
    
    /**
     * @return Api\Scope
     */
    public static function scope()
    {
        return static::singleton(Api\Scope::class);
    }
    
    /**
     * @return Api\PersonalAccessToken
     */
    public static function personalAccessToken()
    {
        return static::singleton(Api\PersonalAccessToken::class);
    }
    
    /**
     * @return Api\Events
     */
    public static function events()
    {
        return static::singleton(Api\Events::class);
    }
    
    /**
     * @return Api\Users
     */
    public static function users()
    {
        return static::singleton(Api\Users::class);
    }
    
    /**
     * @return Api\Clients
     */
    public static function clients()
    {
        return static::singleton(Api\Clients::class);
    }
    
    /**
     * @return Api\Departments
     */
    public static function departments()
    {
        return static::singleton(Api\Departments::class);
    }
    
    /**
     * @return Api\Calendars
     */
    public static function calendars()
    {
        return static::singleton(Api\Calendars::class);
    }
    
    /**
     * @return Api\ProcessCategory
     */
    public static function processCategory()
    {
        return static::singleton(Api\ProcessCategory::class);
    }
    
    /**
     * @return Api\Processes
     */
    public static function processes()
    {
        return static::singleton(Api\Processes::class);
    }
    
    /**
     * @return Api\Dynaforms
     */
    public static function dynaforms()
    {
        return static::singleton(Api\Dynaforms::class);
    }
    
    /**
     * @return Api\Groups
     */
    public static function groups()
    {
        return static::singleton(Api\Groups::class);
    }
    
    /**
     * @return Api\Task
     */
    public static function task()
    {
        return static::singleton(Api\Task::class);
    }
    
    /**
     * @return Api\TaskConnector
     */
    public static function taskConnector()
    {
        return static::singleton(Api\TaskConnector::class);
    }
    
    /**
     * @return Api\EventConnector
     */
    public static function eventConnector()
    {
        return static::singleton(Api\EventConnector::class);
    }
    
    /**
     * @return Api\InputDocument
     */
    public static function inputDocument()
    {
        return static::singleton(Api\InputDocument::class);
    }
    
    /**
     * @return Api\OutputDocuments
     */
    public static function outputDocuments()
    {
        return static::singleton(Api\OutputDocuments::class);
    }
    
    /**
     * @return Api\EmailServer
     */
    public static function emailServer()
    {
        return static::singleton(Api\EmailServer::class);
    }
    
    /**
     * @return Api\Message
     */
    public static function message()
    {
        return static::singleton(Api\Message::class);
    }
    
    /**
     * @return Api\MessageVariable
     */
    public static function messageVariable()
    {
        return static::singleton(Api\MessageVariable::class);
    }
    
    /**
     * @return Api\Gateway
     */
    public static function gateway()
    {
        return static::singleton(Api\Gateway::class);
    }
    
    /**
     * @return Api\Flows
     */
    public static function flows()
    {
        return static::singleton(Api\Flows::class);
    }
    
    /**
     * @return Api\Instance
     */
    public static function instance()
    {
        return static::singleton(Api\Instance::class);
    }
    
    /**
     * @return Api\TaskInstanceTask
     */
    public static function taskInstanceTask()
    {
        return static::singleton(Api\TaskInstanceTask::class);
    }
    
    /**
     * @return Api\TaskInstanceInstance
     */
    public static function taskInstanceInstance()
    {
        return static::singleton(Api\TaskInstanceInstance::class);
    }
    
    /**
     * @return Api\TaskInstance
     */
    public static function taskInstance()
    {
        return static::singleton(Api\TaskInstance::class);
    }
    
    /**
     * @return Api\DataModel
     */
    public static function dataModel()
    {
        return static::singleton(Api\DataModel::class);
    }
    
    /**
     * @return Api\InputOutput
     */
    public static function inputOutput()
    {
        return static::singleton(Api\InputOutput::class);
    }
    
    /**
     * @return Api\Log
     */
    public static function log()
    {
        return static::singleton(Api\Log::class);
    }
    
    /**
     * @return Api\ProcessImport
     */
    public static function processImport()
    {
        return static::singleton(Api\ProcessImport::class);
    }
    
    /**
     * @return Api\AccessToken
     */
    public static function accessToken()
    {
        return static::singleton(Api\AccessToken::class);
    }
}
