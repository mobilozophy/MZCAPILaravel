<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Coupon;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class CouponAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'coupons';

    /**
     * Send a request to retrieve a store.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function get(Credentials $credentials, $accountId, $storeId = null)
    {
        $storeURLAppend = ($storeId)?'?storeId='.$storeId:'';
        $requestUrl = $this->getEndpointRequestUrl($accountId).$storeURLAppend;

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray()
        ]);

    }

    /**
     * Send a request to retrieve all stores.
     *
     * @param Credentials $credentials
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAllForAvailability(Credentials $credentials, $availability)
    {
        $requestUrl = $this->getEndpointRequestUrl().'?availability='.$availability;
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray()
        ]);

    }

}
