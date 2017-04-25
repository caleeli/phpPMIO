<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class Events extends ApiPackage
{
    public function webhook($process, $events)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/events/' . $events . '/webhook';
    
        return $this->api->call($settings);
    }
    public function index($process, $include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/events'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($process, $event, $include=null, $fields=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/events/' . $event .$this->buildQuery(['include'=>$include,'fields'=>$fields,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($process, $process_id, $type, $definition, $behavior, $interrupting, $condition, $time, $duration, $cycle, $name, $description, $attached_to_task_id)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/events';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "event",
                "attributes" => $this->cleanData([
                    "process_id" => $process_id,
                    "type" => $type,
                    "definition" => $definition,
                    "behavior" => $behavior,
                    "interrupting" => $interrupting,
                    "condition" => $condition,
                    "time" => $time,
                    "duration" => $duration,
                    "cycle" => $cycle,
                    "name" => $name,
                    "description" => $description,
                    "attached_to_task_id" => $attached_to_task_id,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($process, $event, $id, $process_id, $type, $definition, $behavior, $interrupting, $condition, $time, $duration, $cycle, $name, $description, $attached_to_task_id)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/events/' . $event ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "event",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "process_id" => $process_id,
                    "type" => $type,
                    "definition" => $definition,
                    "behavior" => $behavior,
                    "interrupting" => $interrupting,
                    "condition" => $condition,
                    "time" => $time,
                    "duration" => $duration,
                    "cycle" => $cycle,
                    "name" => $name,
                    "description" => $description,
                    "attached_to_task_id" => $attached_to_task_id,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($process, $event)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/events/' . $event ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function trigger($process, $events, $data)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/events/' . $events . '/trigger';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "attributes" => [
                    "content" => json_encode($data)
                ]
            ]
        ]);
        return $this->api->call($settings);
    }
}
