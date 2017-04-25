<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class Dynaforms extends ApiPackage
{
    public function index($process, $include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/dynaforms'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($process, $dynaform, $include=null, $fields=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/dynaforms/' . $dynaform .$this->buildQuery(['include'=>$include,'fields'=>$fields,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($process, $process_id, $type, $filename, $content, $label, $version, $title, $description)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/dynaforms';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "dynaform",
                "attributes" => $this->cleanData([
                    "process_id" => $process_id,
                    "type" => $type,
                    "filename" => $filename,
                    "content" => $content,
                    "label" => $label,
                    "version" => $version,
                    "title" => $title,
                    "description" => $description,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($process, $dynaform, $id, $process_id, $type, $filename, $content, $label, $version, $title, $description)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/dynaforms/' . $dynaform ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "dynaform",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "process_id" => $process_id,
                    "type" => $type,
                    "filename" => $filename,
                    "content" => $content,
                    "label" => $label,
                    "version" => $version,
                    "title" => $title,
                    "description" => $description,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($process, $dynaform)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/dynaforms/' . $dynaform ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}
