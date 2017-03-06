<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\UrlShortener;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
//use Log;

class UrlShortenerAPIService extends AbstractAPIService
{
    const ENDPOINT = 'url-shortener';

    public function getAllDomainsForAccount(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl().'/domains';

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    protected function getBaseRequestUrl($segments = null)
    {
        if (is_array($segments)) {
            $segments = implode('/', $segments);
        }

        $baseUrl = config('services.mz_v2_api.url');

        return $baseUrl . '/' . $segments;
    }
}
