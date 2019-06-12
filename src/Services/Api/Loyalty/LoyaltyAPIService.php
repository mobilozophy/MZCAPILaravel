<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Loyalty;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class LoyaltyAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'loyalty';

    /**
     * Send a request to retrieve a loyalty program.
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
}
