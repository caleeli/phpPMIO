<?php
namespace ProcessMaker\PMIO;

class ApiBase
{
    protected $baseUrl;
    protected $accessToken;

    protected $settings = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HTTPHEADER => [
            "authorization: Basic eC1wbS1sb2NhbC1jbGllbnQ6MTc5YWQ0NWM2Y2UyY2I5N2NmMTAyOWUyMTIwNDZlODE",
            "cache-control: no-cache",
            "content-type: application/json"
        ]
    ];

    public function call($settings)
    {
        $curl = curl_init();
        curl_setopt_array($curl, $settings);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $info = curl_getinfo($curl);
        $statusCode = $info['http_code'];
        curl_close($curl);
        if ($err) {
            throw new CurlException($err);
        } else {
            if ($statusCode == 200) {
                return json_decode($response);
            } else {
                throw new ApiException(strip_tags($response));
            }
        }
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}
