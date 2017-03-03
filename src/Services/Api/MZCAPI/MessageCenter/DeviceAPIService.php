<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

class DeviceAPIService extends AbstractAPIService
{
    const ENDPOINT = 'message-center/devices';

    /**
     * Send a request to add a new store.
     *
     * @param Credentials $credentials
     * @param array $keyword
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function add(Credentials $credentials, array $keyword)
    {
        $requestUrl = $this->getEndpointRequestUrl();


        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'form_params' => $keyword
        ]);
    }

    /**
     * Send a request to retrieve a store.
     *
     * @param Credentials $credentials
     * @param integer $storeId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function get(Credentials $credentials, $keywordid)
    {
        $requestUrl = $this->getEndpointRequestUrl($keywordid);
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    /**
     * Send a request to retrieve all stores.
     *
     * @param Credentials $credentials
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAll(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl();

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    /**
     * Send a request to delete a store.
     *
     * @param Credentials $credentials
     * @param integer $storeId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function delete(Credentials $credentials, $storeId)
    {
        $requestUrl = $this->getEndpointRequestUrl($storeId);

        return $this->httpClient->delete($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    /**
     * Get base API request URL with additional segments.
     *
     * @param mixed $segments
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
