<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Store;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

class StoreAPIService extends AbstractAPIService
{
    const ENDPOINT = 'stores';

    /**
     * Send a request to add a new store.
     *
     * @param Credentials $credentials
     * @param array $params
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
     * Send a request ti update a store
     * @param Credentials $credentials
     * @param             $accountId
     * @param array       $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(Credentials $credentials, $id, array $params, $accountId )
    {
        $requestUrl = $this->getEndpointRequestUrl($id);

        return $this->httpClient->put($requestUrl, [
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

    public function getByLocation(Credentials $credentials, $lat, $lon, $rad, $measurement='miles',$accountId)
    {
        $requestUrl = $this->getEndpointRequestUrl($accountId).'/'.$lat.'/'.$lon.'/'.$rad;
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    public function getCouponsByLocation(Credentials $credentials, $lat, $lon, $rad, $measurement='miles',$accountId)
    {
        $requestUrl = $this->getEndpointRequestUrl($accountId).'/scope/coupons/'.$lat.'/'.$lon.'/'.$rad;
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
