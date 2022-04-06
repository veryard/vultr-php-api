<?php

namespace Vultr\Adapter;

use Vultr\Exception\ApiException;

abstract class AbstractAdapter implements AdapterInterface
{
    public function emitError($code, $response)
    {
        switch($code) {
            case 400:
                throw new ApiException('Invalid API location. Check the URL that you are using.');
                break;
            case 403:
                throw new ApiException('Invalid or missing API key. Check that your API key is present and matches your assigned key.');
                break;
            case 405:
                throw new ApiException('Invalid HTTP method. Check that the method (POST|GET) matches what the documentation indicates.');
                break;
            case 500:
                throw new ApiException('Internal server error. Try again at a later time.');
                break;
            case 412:
                throw new ApiException(
                    sprintf('Request failed: %s', $response)
                );
                break;
            case 503:
                throw new ApiException('Rate limit hit. API requests are limited to an average of 2/s. Try your request again later.');
                break;
        }
    }
}
