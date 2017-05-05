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
            "cache-control: no-cache",
            'Accept: application/json',
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
            if ($statusCode >= 200 && $statusCode < 300) {
                return $this->encodeResponse($response, $info);
            } else {
                $error = $this->encodeResponse($response, $info);
                if (is_object($error) && isset($error->errors)) {
                    $previous = null;
                    for ($i = count($error->errors) - 1; $i >= 0; $i--) {
                        $exception = new ApiException(
                            $error->errors[$i]->title . (isset($error->errors[$i]->detail) ? ': ' . $error->errors[$i]->detail : ''),
                            $error->errors[$i]->code,
                            $previous
                        );
                        $previous = $exception;
                    }
                } elseif(is_object($error) && isset($error->error)) {
                    $exception = new ApiException($error->error.': '.$error->message);
                } else {
                    $exception = new ApiException($error);
                }
                throw $exception;
            }
        }
    }

    protected function encodeResponse($response, $info)
    {
        if (strpos($info["content_type"], "json") !== false) {
            return json_decode($response);
        } else {
            return $response;
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
