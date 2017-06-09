<?php

namespace Mobilozophy\MZCAPILaravel\Services\Reporting;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\Reporting\ReportingAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Reporting\SMSReportingAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class ReportingService extends ServiceBase
{

    public function __construct(
        ReportingAPIService $reportingAPIService
    ) {
        $this->reportingAPIService = $reportingAPIService;
    }




    /**
     * Get keywords.
     */
    public function getTransactionReport($type, $timespan, $account_uuid, $scope, $otherHeaders)
    {

        $response = $this->reportingAPIService->getTransactionReport(
            $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders),$type,$timespan
        );

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


}
