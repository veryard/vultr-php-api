<?php

namespace Vultr\Adapter;

use Vultr\Client;
use Vultr\Exception\ApiException;

class CurlAdapter extends AbstractAdapter
{
    protected $endpoint;

    protected $apiToken;

    protected $responseCode;

    public function __construct($apiToken)
    {
        $this->apiToken = $apiToken;
        $this->responseCode = 0;

        $this->endpoint = Client::BASE_URL;
    }

    public function setEndpoint($endpoint) 
    {
        $this->endpoint = $endpoint;
    }

    public function get($url, array $args = array())
    {
        return $this->query($url, $args, 'GET');
    }

    public function post($url, array $args, $getCode = false)
    {
        return $this->query($url, $args, 'POST', $getCode);
    }

    public function delete($url, array $args = array(), $getCode = false)
    {
        return $this->query($url, $args, 'DELETE', $getCode);
    }

    public function put($url, array $args, $getCode = false)
    {
        return $this->query($url, $args, 'PUT', $getCode);
    }

    public function patch($url, array $args, $getCode = false)
    {
        return $this->query($url, $args, 'PUT', $getCode);
    }

    protected function query($url, array $args, $method, $getCode = false)
    {
        
        $url = $this->endpoint . $url;
        $options = [
            CURLOPT_USERAGENT => Client::USER_AGENT,
            CURLOPT_HEADER => 0,
            CURLOPT_VERBOSE => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_HTTP_VERSION => '1.0',
            CURLOPT_FOLLOWLOCATION => 0,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' . $this->apiToken
            ],
        ];

        switch($method) {
            case 'GET':
                if(!empty($args)) {
                    $data = http_build_query($args);
                    $url .= '?' . $data;
                }
                break;
                
            case 'POST':
                $options[CURLOPT_POST] = 1;
                $options[CURLOPT_POSTFIELDS] = json_encode($args);
                break;

            case 'DELETE':
                $options[CURLOPT_CUSTOMREQUEST] = 'DELETE';
                $options[CURLOPT_POSTFIELDS] = json_encode($args);
                break;
            
            case 'PUT':
                $options[CURLOPT_CUSTOMREQUEST] = 'PUT';
                $options[CURLOPT_POSTFIELDS] = json_encode($args);
                break;

            case 'PATCH':
                $options[CURLOPT_CUSTOMREQUEST] = 'PATCH';
                $options[CURLOPT_POSTFIELDS] = json_encode($args);
                break;
        }

        $curl = curl_init($url);
        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);

        $result = json_decode($response);

        $this->hasError($curl, $result, $getCode);

        if($getCode) {
            return $this->responseCode;
        }

        return $result;
    }

    protected function hasError($curl, $result, $getCode)
    {
        $error = curl_error($curl);
        if(!empty($error)) {
            throw new ApiException($error);
        }

        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if(isset($result->status)) {
            if($result->status != 200) {
                throw new ApiException($result->error);
            }
        }

        if($getCode) {
            $this->responseCode = $code;
            return;
        }
    }
}
