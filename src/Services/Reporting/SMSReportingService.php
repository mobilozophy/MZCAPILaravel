<?php

namespace Mobilozophy\MZCAPILaravel\Services\Reporting;


use Mobilozophy\MZCAPILaravel\Services\Api\Reporting\SMSReportingAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class SMSReportingService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Reporting
 */
class SMSReportingService extends ServiceBase
{

    /**
     * SMSReportingService constructor.
     * @param SMSReportingAPIService $smsReportingAPIService
     */
    public function __construct(
        SMSReportingAPIService $smsReportingAPIService
    ) {
        $this->smsReportingAPIService = $smsReportingAPIService;
    }

    /**
     * @return mixed
     */
    public function getSubscriptions()
    {
        $response = $this->smsReportingAPIService->getSubscriptions(
            $this->getSubAccountCredentials()
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }

    /**
     * @param string $lookupVal The value to lookup. (ex. +17275551212)
     * @param string $lookupValType The type of subscription (ex. sms)
     * @return mixed
     */
    public function getSubscriptionConfirmation($lookupVal, $lookupValType)
    {
        $response = $this->smsReportingAPIService->getSubscriptionConfirmation(
            $this->getSubAccountCredentials(),
            $lookupVal,
            $lookupValType
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }



}
