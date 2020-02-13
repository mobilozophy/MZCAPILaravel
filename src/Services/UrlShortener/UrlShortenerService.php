<?php

namespace Mobilozophy\MZCAPILaravel\Services\UrlShortener;

use Mobilozophy\MZCAPILaravel\Services\Api\UrlShortener\UrlShortenerAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class UrlShortenerService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\UrlShortener
 */
class UrlShortenerService extends ServiceBase
{
    /**
     * UrlShortenerService constructor.
     * @param UrlShortenerAPIService $urlShortenerAPIService
     */
    public function __construct(UrlShortenerAPIService $urlShortenerAPIService)
    {
        $this->apiService = $urlShortenerAPIService;
    }

    public function getDomains($account_id = null, $scope = false, $otherHeaders = [])
    {
        $response = $this->apiService->getDomains(
            $this->getSubAccountCredentials(
                $account_id,
                $scope,
                $otherHeaders
            )
        );

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }
}
