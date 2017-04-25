<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class Departments extends ApiPackage
{
    public function index($include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/departments'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($department, $include=null, $fields=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/departments/' . $department .$this->buildQuery(['include'=>$include,'fields'=>$fields,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($title, $status, $manager_user_id, $parent_department_id, $created_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/departments';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "department",
                "attributes" => $this->cleanData([
                    "title" => $title,
                    "status" => $status,
                    "manager_user_id" => $manager_user_id,
                    "parent_department_id" => $parent_department_id,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($department, $id, $title, $status, $manager_user_id, $parent_department_id, $created_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/departments/' . $department ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "department",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "title" => $title,
                    "status" => $status,
                    "manager_user_id" => $manager_user_id,
                    "parent_department_id" => $parent_department_id,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($department)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/departments/' . $department ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}
