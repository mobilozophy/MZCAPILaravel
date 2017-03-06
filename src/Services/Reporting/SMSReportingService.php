<?php

namespace Mobilozophy\MZCAPILaravel\Services\Reporting;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\Reporting\SMSReportingAPIService;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class SMSReportingService
{
    use UsesCredentialsTrait;

    private $smsReportingAPIService;


    public function __construct(
        SMSReportingAPIService $smsReportingAPIService
    ) {
        $this->smsReportingAPIService = $smsReportingAPIService;
    }




    /**
     * Get keywords.
     */
    public function getSubscriptions()
    {
        return $this->smsReportingAPIService->getSubscriptions(
            $this->getSubAccountCredentials()
        )->json();
    }

    public function getSubscriptionConfirmation($lookupVal, $lookupValType)
    {
        return $this->smsReportingAPIService->getSubscriptionConfirmation(
            $this->getSubAccountCredentials(),
            $lookupVal,
            $lookupValType
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
