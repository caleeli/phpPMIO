<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class Flows extends ApiPackage
{
    public function index($process)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/flows';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($process, $flow)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/flows/' . $flow ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($process, $process_id, $from_object_id, $from_object_type, $to_object_id, $to_object_type, $index, $type, $condition, $default, $optional, $name, $description, $created_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/flows';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "flow",
                "attributes" => $this->cleanData([
                    "process_id" => $process_id,
                    "from_object_id" => $from_object_id,
                    "from_object_type" => $from_object_type,
                    "to_object_id" => $to_object_id,
                    "to_object_type" => $to_object_type,
                    "index" => $index,
                    "type" => $type,
                    "condition" => $condition,
                    "default" => $default,
                    "optional" => $optional,
                    "name" => $name,
                    "description" => $description,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($process, $flow, $id, $process_id, $from_object_id, $from_object_type, $to_object_id, $to_object_type, $index, $type, $condition, $default, $optional, $name, $description, $created_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/flows/' . $flow ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "flow",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "process_id" => $process_id,
                    "from_object_id" => $from_object_id,
                    "from_object_type" => $from_object_type,
                    "to_object_id" => $to_object_id,
                    "to_object_type" => $to_object_type,
                    "index" => $index,
                    "type" => $type,
                    "condition" => $condition,
                    "default" => $default,
                    "optional" => $optional,
                    "name" => $name,
                    "description" => $description,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($process, $flow)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/flows/' . $flow ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}
