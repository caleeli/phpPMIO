<?php
namespace ProcessMaker\PMIO;

class Users extends ApiPackage
{
    public function index()
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/users';
    
        return $this->api->call($settings);
    }
    public function show(user)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/users/' + user + '';
    
        return $this->api->call($settings);
    }
}
