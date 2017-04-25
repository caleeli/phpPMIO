<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class InputDocument extends ApiPackage
{
    public function index($process, $include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/input_documents'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($process, $input_document, $include=null, $fields=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/input_documents/' . $input_document .$this->buildQuery(['include'=>$include,'fields'=>$fields,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($process, $title, $description, $process_id, $form_needed, $original, $published, $versioning, $destination_path, $tags, $content_type, $max_filesize, $created_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/input_documents';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "input_document",
                "attributes" => $this->cleanData([
                    "title" => $title,
                    "description" => $description,
                    "process_id" => $process_id,
                    "form_needed" => $form_needed,
                    "original" => $original,
                    "published" => $published,
                    "versioning" => $versioning,
                    "destination_path" => $destination_path,
                    "tags" => $tags,
                    "content_type" => $content_type,
                    "max_filesize" => $max_filesize,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($process, $input_document, $id, $title, $description, $process_id, $form_needed, $original, $published, $versioning, $destination_path, $tags, $content_type, $max_filesize, $created_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/input_documents/' . $input_document ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "input_document",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "title" => $title,
                    "description" => $description,
                    "process_id" => $process_id,
                    "form_needed" => $form_needed,
                    "original" => $original,
                    "published" => $published,
                    "versioning" => $versioning,
                    "destination_path" => $destination_path,
                    "tags" => $tags,
                    "content_type" => $content_type,
                    "max_filesize" => $max_filesize,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($process, $input_document)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/input_documents/' . $input_document ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}
