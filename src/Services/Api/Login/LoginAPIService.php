<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Login;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;
use Illuminate\Support\Facades\Log;

class LoginAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'gplogin';

    /**
     * Send a request to retrieve a Login resource.
     * @param Credentials $credentials
     *
     * @return
     */
    public function get(Credentials $credentials, $id, $include = [])
    {
        $requestUrl = $this->getEndpointRequestUrl();

        Log::info($requestUrl);

        $response = $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);

        return $response;
    }

    public function confirmLogin(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl();

        Log::info($requestUrl);

        $response = $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);

        return $response;
    }
}
