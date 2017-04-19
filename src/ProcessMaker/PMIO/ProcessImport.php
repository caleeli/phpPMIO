<?php
namespace ProcessMaker\PMIO;

class ProcessImport extends ApiPackage
{
    public function store()
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/import';
        $settings[CURLOPT_POSTFIELDS] = json_encode([]);
        return $this->api->call($settings);
    }
}
