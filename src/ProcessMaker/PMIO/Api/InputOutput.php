<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class InputOutput extends ApiPackage
{
    public function index($process, $task, $include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks/' . $task . '/inputoutput'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($process, $task, $inputoutput, $include=null, $fields=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks/' . $task . '/inputoutput/' . $inputoutput .$this->buildQuery(['include'=>$include,'fields'=>$fields,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($process, $task, $input_parameters, $output_parameters)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks/' . $task . '/inputoutput';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "input_output",
                "attributes" => $this->cleanData([
                    "input_parameters" => $input_parameters,
                    "output_parameters" => $output_parameters,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($process, $task, $inputoutput, $id, $input_parameters, $output_parameters)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks/' . $task . '/inputoutput/' . $inputoutput ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "input_output",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "input_parameters" => $input_parameters,
                    "output_parameters" => $output_parameters,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($process, $task, $inputoutput)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks/' . $task . '/inputoutput/' . $inputoutput ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}
