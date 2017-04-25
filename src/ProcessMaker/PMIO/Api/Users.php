<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class Users extends ApiPackage
{
    public function mySelf()
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/users/myself';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function index($include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/users'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($user, $include=null, $fields=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/users/' . $user .$this->buildQuery(['include'=>$include,'fields'=>$fields,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($username, $firstname, $lastname, $email, $expire_date, $status, $country, $city, $location, $address, $phone, $fax, $cellular, $zip_code, $department, $position, $resume, $birthday, $calendar_id, $reports_to, $replaced_by, $cost_by_hour, $unit_cost, $bookmark_start_cases, $time_zone, $default_lang, $created_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/users';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "user",
                "attributes" => $this->cleanData([
                    "username" => $username,
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "email" => $email,
                    "expire_date" => $expire_date,
                    "status" => $status,
                    "country" => $country,
                    "city" => $city,
                    "location" => $location,
                    "address" => $address,
                    "phone" => $phone,
                    "fax" => $fax,
                    "cellular" => $cellular,
                    "zip_code" => $zip_code,
                    "department" => $department,
                    "position" => $position,
                    "resume" => $resume,
                    "birthday" => $birthday,
                    "calendar_id" => $calendar_id,
                    "reports_to" => $reports_to,
                    "replaced_by" => $replaced_by,
                    "cost_by_hour" => $cost_by_hour,
                    "unit_cost" => $unit_cost,
                    "bookmark_start_cases" => $bookmark_start_cases,
                    "time_zone" => $time_zone,
                    "default_lang" => $default_lang,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($user, $id, $username, $firstname, $lastname, $email, $expire_date, $status, $country, $city, $location, $address, $phone, $fax, $cellular, $zip_code, $department, $position, $resume, $birthday, $calendar_id, $reports_to, $replaced_by, $cost_by_hour, $unit_cost, $bookmark_start_cases, $time_zone, $default_lang, $created_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/users/' . $user ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "user",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "username" => $username,
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "email" => $email,
                    "expire_date" => $expire_date,
                    "status" => $status,
                    "country" => $country,
                    "city" => $city,
                    "location" => $location,
                    "address" => $address,
                    "phone" => $phone,
                    "fax" => $fax,
                    "cellular" => $cellular,
                    "zip_code" => $zip_code,
                    "department" => $department,
                    "position" => $position,
                    "resume" => $resume,
                    "birthday" => $birthday,
                    "calendar_id" => $calendar_id,
                    "reports_to" => $reports_to,
                    "replaced_by" => $replaced_by,
                    "cost_by_hour" => $cost_by_hour,
                    "unit_cost" => $unit_cost,
                    "bookmark_start_cases" => $bookmark_start_cases,
                    "time_zone" => $time_zone,
                    "default_lang" => $default_lang,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($user)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/users/' . $user ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}
