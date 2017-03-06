<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\Account;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

class AccountAPIService extends AbstractAPIService
{
    const ENDPOINT = 'accounts';

    /**
     * Send a request to add a new store.
     *
     * @param Credentials $credentials
     * @param array $keyword
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function add(Credentials $credentials, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl();


        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'form_params' => $params
        ]);
    }

    /**
     * Send a request to retrieve a store.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function get(Credentials $credentials, $accountId)
    {
        $requestUrl = $this->getEndpointRequestUrl($accountId);
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
     * @param integer $accountId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function delete(Credentials $credentials, $accountId)
    {
        $requestUrl = $this->getEndpointRequestUrl($accountId);

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
