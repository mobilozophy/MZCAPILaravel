<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\UrlShortener;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;
//use Log;

class UrlShortenerAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'url-shortener';

    public function getDomains(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl(['domains']);

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
        ]);

    }

}
