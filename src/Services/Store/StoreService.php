<?php

namespace Mobilozophy\MZCAPILaravel\Services\Store;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Store\StoreAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class StoreService extends ServiceBase
{

    public function __construct(
        StoreAPIService $storeAPIService
    ) {
        $this->apiService = $storeAPIService;
    }

    public function getByLocation($lat, $lon, $rad, $measurement= 'miles', $account_uuid = null, $scope = false)
    {
        try {
            $response = $this->apiService->getByLocation(
                $this->getSubAccountCredentials($account_uuid,$scope), $lat, $lon, $rad, $measurement, $account_uuid
            );
            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            } else {
                return false;
            }
        } catch (\Exception $e)
        {
            return false;
        }
    }

    public function getCouponsByLocation($lat, $lon, $rad, $registrationId, $measurement= 'miles',  $account_uuid = null, $scope = false)
    {
        try {
            $response = $this->apiService->getCouponsByLocation(
                $this->getSubAccountCredentials(
                    $account_uuid
                    ,$scope
                    ,['MZRegistration'=>$registrationId])
                    ,$lat
                    ,$lon
                    ,$rad
                    ,$measurement
                    ,$account_uuid
            );
            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            } else {
                return false;
            }
        } catch (\Exception $e)
        {
            return false;
        }
    }


}
