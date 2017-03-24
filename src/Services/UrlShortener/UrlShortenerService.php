<?php

namespace Mobilozophy\MZCAPILaravel\Services\UrlShortener;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CodeAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\UrlShortener\UrlShortenerAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class UrlShortenerService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $urlShortenerAPIService;


    public function __construct(
        UrlShortenerAPIService $urlShortenerAPIService
    ) {
        $this->urlShortenerAPIService = $urlShortenerAPIService;
    }




    /**
     * Get keywords.
     */
    public function getDomains()
    {
        return $this->urlShortenerAPIService->getAllDomainsForAccount(
            $this->getSubAccountCredentials()
        )->json();
    }

}
