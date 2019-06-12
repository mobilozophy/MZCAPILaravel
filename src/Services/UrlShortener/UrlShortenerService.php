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
}
