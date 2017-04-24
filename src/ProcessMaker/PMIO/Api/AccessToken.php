<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class AccessToken extends ApiPackage
{
    public function issueToken($username, $password, $clientId, $clientSecret)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'oauth/access_token';
        $settings[CURLOPT_POSTFIELDS] = json_encode([
             "grant_type" => "password",
             "username" => $username,
             "password" => $password,
             "client_id" => $clientId,
             "client_secret" => $clientSecret,
             "scope" => "*"
        ]);
        return $this->api->call($settings);
    }
}
