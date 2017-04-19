<?php
namespace ProcessMaker\PMIO;

class ApiPackage
{
    /**
     * @var ApiBase
     */
    protected $api;

    public function __construct(PMIO $api)
    {
        $this->api = $api;
    }
}
