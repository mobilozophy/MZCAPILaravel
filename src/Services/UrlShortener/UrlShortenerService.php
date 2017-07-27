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
    private $urlShortenerAPIService;

    /**
     * UrlShortenerService constructor.
     * @param UrlShortenerAPIService $urlShortenerAPIService
     */
    public function __construct(
        UrlShortenerAPIService $urlShortenerAPIService
    ) {
        $this->urlShortenerAPIService = $urlShortenerAPIService;
    }

    /**
     * @return mixed
     */
    public function getDomains()
    {
        $response = $this->urlShortenerAPIService->getAllDomainsForAccount(
            $this->getSubAccountCredentials()
        );

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }

}
