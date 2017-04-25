<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class EmailServer extends ApiPackage
{
    public function index($include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/email_servers'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($email_server, $include=null, $fields=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/email_servers/' . $email_server .$this->buildQuery(['include'=>$include,'fields'=>$fields,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($engine, $server, $port, $required_auth, $account, $from_mail, $from_name, $smtp_secure, $try_send_immediately, $to_email, $default, $create_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/email_servers';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "email_server",
                "attributes" => $this->cleanData([
                    "engine" => $engine,
                    "server" => $server,
                    "port" => $port,
                    "required_auth" => $required_auth,
                    "account" => $account,
                    "from_mail" => $from_mail,
                    "from_name" => $from_name,
                    "smtp_secure" => $smtp_secure,
                    "try_send_immediately" => $try_send_immediately,
                    "to_email" => $to_email,
                    "default" => $default,
                    "create_at" => $create_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($email_server, $id, $engine, $server, $port, $required_auth, $account, $from_mail, $from_name, $smtp_secure, $try_send_immediately, $to_email, $default, $create_at, $updated_at)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/email_servers/' . $email_server ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "email_server",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "engine" => $engine,
                    "server" => $server,
                    "port" => $port,
                    "required_auth" => $required_auth,
                    "account" => $account,
                    "from_mail" => $from_mail,
                    "from_name" => $from_name,
                    "smtp_secure" => $smtp_secure,
                    "try_send_immediately" => $try_send_immediately,
                    "to_email" => $to_email,
                    "default" => $default,
                    "create_at" => $create_at,
                    "updated_at" => $updated_at,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($email_server)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/email_servers/' . $email_server ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}
