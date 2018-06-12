<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Login;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class LoyaltyAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'gplogin';

    /**
     * Send a request to retrieve a loyalty program.
     * @param Credentials $credentials
     * @param int         $accountId
     * @param null        $storeId
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl();

        $response = $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray()
        ]);

        return $response;

    }

}
