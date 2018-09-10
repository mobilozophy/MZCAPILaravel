<?php

namespace Mobilozophy\MZCAPILaravel\Services\Reporting;


use Mobilozophy\MZCAPILaravel\Services\Api\Reporting\ReportingAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class ReportingService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Reporting
 */
class ReportingService extends ServiceBase
{
    public $reportingAPIService;

    /**
     * ReportingService constructor.
     * @param ReportingAPIService $reportingAPIService
     */
    public function __construct(
        ReportingAPIService $reportingAPIService
    ) {
        $this->reportingAPIService = $reportingAPIService;
    }

    /**
     * @param string $type The type of report.
     * @param string $timespan The timespan of the report.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @return bool|mixed
     */
    public function getTransactionReport($type, $timespan, $account_uuid, $scope, $otherHeaders, $user = null ,$pass = null)
    {
        if( (!is_null($user)) && (!is_null($pass)))
        {
            $response = $this->reportingAPIService->getTransactionReport(
                $this->customSubAccountCredentials($user, $pass, $account_uuid,$scope, $otherHeaders),$type,$timespan
            );
        }
        else
        {
            $response = $this->reportingAPIService->getTransactionReport(
                $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders),$type,$timespan
            );
        }


        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }

    /**
     * @param string $type The type of report.
     * @param string $timespan The timespan of the report.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @return bool|mixed
     */
    public function getRegistrationReport($type, $timespan, $account_uuid, $scope, $otherHeaders, $user = null ,$pass = null)
    {
        if( (!is_null($user)) && (!is_null($pass)))
        {
            $response = $this->reportingAPIService->getRegistrationsReport(
                $this->customSubAccountCredentials($user, $pass, $account_uuid,$scope, $otherHeaders),$type,$timespan
            );
        }
        else
        {
            $response = $this->reportingAPIService->getRegistrationsReport(
                $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders),$type,$timespan
            );
        }

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


    /**
     * @return bool|mixed
     */
    public function getMerchantReport($account_uuid, $scope = false, $otherHeaders=[])
    {
        try
        {
            $response = $this->reportingAPIService->getMerchantReport(
                $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders)
            );

            if ($response->getStatusCode() == 200)
            {
                return json_decode($response->getBody()->getContents(), true);
            }
            else
            {
                return false;
            }
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    public function getConsumerActivityRegistrations($account_uuid, $scope = false, $otherHeaders=[])
    {
        try
        {
            $response = $this->reportingAPIService->getConsumerActivityReport(
                $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders)
            );

            if ($response->getStatusCode() == 200)
            {
                return json_decode($response->getBody()->getContents(), true);
            }
            else
            {
                return false;
            }
        }
        catch (\Exception $e)
        {
            return false;
        }
    }


}
