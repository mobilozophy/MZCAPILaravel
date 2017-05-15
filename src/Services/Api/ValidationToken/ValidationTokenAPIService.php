<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\ValidationToken;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

class ValidationTokenAPIService extends AbstractAPIService
{
    const ENDPOINT = 'validation-token';


    /**
     * Send a request to retrieve a store.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function get(Credentials $credentials, $resource, $resource_id)
    {
        $requestUrl = $this->getEndpointRequestUrl([$resource, $resource_id]);
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    /**
     * Send a request to retrieve a store.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getByToken(Credentials $credentials, $token)
    {
        $requestUrl = $this->getEndpointRequestUrl([$token]);

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }



    /**
     * Get base API request URL with additional segments.
     *
     * @param mixed $segments
     *
     * @return string
     */
    protected function getBaseRequestUrl($segments = null)
    {
        if (is_array($segments)) {
            $segments = implode('/', $segments);
        }

        $baseUrl = env('MZCAPI_BASEURL');

        return $baseUrl . '/' . $segments;
    }
}
