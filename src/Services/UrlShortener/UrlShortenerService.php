<?php

namespace Mobilozophy\MZCAPILaravel\Services\UrlShortener;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CodeAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\UrlShortener\UrlShortenerAPIService;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class UrlShortenerService
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


    public function getSubAccountCredentials()
    {
        return new Credentials(
            env('MZCAPI_USER'),
            env('MZCAPI_PASS'),
            [
                'Accept'=>'application/vnd.mzcapi.v2+json',
                'MZAccount'=>env('MZCAPI_ACCT')
            ]
        );
    }
}
