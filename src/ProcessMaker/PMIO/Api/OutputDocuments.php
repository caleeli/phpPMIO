<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class OutputDocuments extends ApiPackage
{
    public function index($process, $include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/output_documents'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($process, $output_document)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/output_documents/' . $output_document ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($process, $title, $description, $process_id, $media, $orientation, $margin_left, $margin_right, $margin_top, $margin_bottom, $generate, $enable_versioning, $open_type, $destination_path, $security_enabled, $template)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/output_documents';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "output_document",
                "attributes" => $this->cleanData([
                    "title" => $title,
                    "description" => $description,
                    "process_id" => $process_id,
                    "media" => $media,
                    "orientation" => $orientation,
                    "margin_left" => $margin_left,
                    "margin_right" => $margin_right,
                    "margin_top" => $margin_top,
                    "margin_bottom" => $margin_bottom,
                    "generate" => $generate,
                    "enable_versioning" => $enable_versioning,
                    "open_type" => $open_type,
                    "destination_path" => $destination_path,
                    "security_enabled" => $security_enabled,
                    "template" => $template,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($process, $output_document, $id, $title, $description, $process_id, $media, $orientation, $margin_left, $margin_right, $margin_top, $margin_bottom, $generate, $enable_versioning, $open_type, $destination_path, $security_enabled, $template)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/output_documents/' . $output_document ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "output_document",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "title" => $title,
                    "description" => $description,
                    "process_id" => $process_id,
                    "media" => $media,
                    "orientation" => $orientation,
                    "margin_left" => $margin_left,
                    "margin_right" => $margin_right,
                    "margin_top" => $margin_top,
                    "margin_bottom" => $margin_bottom,
                    "generate" => $generate,
                    "enable_versioning" => $enable_versioning,
                    "open_type" => $open_type,
                    "destination_path" => $destination_path,
                    "security_enabled" => $security_enabled,
                    "template" => $template,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($process, $output_document)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/output_documents/' . $output_document ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}
