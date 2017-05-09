<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Loyalty;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class LoyaltyAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'loyalty';

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
    
}
