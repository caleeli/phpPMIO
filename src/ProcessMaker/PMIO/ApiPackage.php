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

    protected function cleanData($data)
    {
        foreach ($data as $key => $value) {
            if ($value === null) {
                unset($data[$key]);
            }
        }
    }
}
