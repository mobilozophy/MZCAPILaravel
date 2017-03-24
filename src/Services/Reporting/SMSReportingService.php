<?php

namespace Mobilozophy\MZCAPILaravel\Services\Reporting;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\Reporting\SMSReportingAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class SMSReportingService extends ServiceBase
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



}
