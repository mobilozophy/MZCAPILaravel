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
    public function __construct(SMSReportingAPIService $smsReportingAPIService)
    {
        $this->smsReportingAPIService = $smsReportingAPIService;
    }

    /**
     * @return mixed
     */
    public function getSubscriptions(
        $account_uuid = null,
        $scope = false,
        $otherHeaders = [],
        $user = null,
        $pass = null
    )
    {
        if (!is_null($user) && !is_null($pass)) {
            $response = $this->smsReportingAPIService->getSubscriptions(
                $this->customSubAccountCredentials(
                    $user,
                    $pass,
                    $account_uuid,
                    $scope,
                    $otherHeaders
                )
            );
        } else {
            $response = $this->smsReportingAPIService->getSubscriptions(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                )
            );
        }

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }

    /**
     * @param string $lookupVal The value to lookup. (ex. +17275551212)
     * @param string $lookupValType The type of subscription (ex. sms)
     * @return mixed
     */
    public function getSubscriptionConfirmation(
        $lookupVal, $lookupValType,
        $account_uuid = null,
        $scope = false,
        $otherHeaders = [],
        $user = null,
        $pass = null)
    {
        if (!is_null($user) && !is_null($pass)) {
            $response = $this->smsReportingAPIService->getSubscriptionConfirmation(
                $this->customSubAccountCredentials(
                    $user,
                    $pass,
                    $account_uuid,
                    $scope,
                    $otherHeaders
                ), $lookupVal, $lookupValType
            );
        } else {
            $response = $this->smsReportingAPIService->getSubscriptionConfirmation(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                ), $lookupVal, $lookupValType
            );
        }

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }
}
