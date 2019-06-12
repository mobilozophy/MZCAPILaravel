<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Coupon;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class CouponAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'coupons';

    /**
     * Send a request to retrieve a coupon.
     * @param Credentials $credentials
     * @param int         $accountId
     * @param null        $storeId
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(Credentials $credentials, $accountId, $storeId = null)
    {
        $storeURLAppend = $storeId ? '?storeId=' . $storeId : '';
        $requestUrl =
            $this->getEndpointRequestUrl($accountId) . $storeURLAppend;

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    /**
     * Send a request to retrieve all coupons for given availability.
     *
     * @param Credentials $credentials
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getAllForAvailability(
        Credentials $credentials,
        $availability
    ) {
        $requestUrl =
            $this->getEndpointRequestUrl() . '?availability=' . $availability;
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }
}
