<?php

namespace Mobilozophy\MZCAPILaravel\Services\Store;

use Mobilozophy\MZCAPILaravel\Services\Api\Store\StoreAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class StoreService extends ServiceBase
{

    /**
     * StoreService constructor.
     * @param StoreAPIService $storeAPIService
     */
    public function __construct(
        StoreAPIService $storeAPIService
    ) {
        $this->apiService = $storeAPIService;
    }

    /**
     * @param string $lat Latitude
     * @param string $lon Longitude
     * @param string $rad Radius
     * @param string $measurement (miles or kilometers)
     * @param array $include Related items to include in response.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param null|string $registrationId The registration If of the user making the request.
     * @return bool|string
     */
    public function getByLocation($lat, $lon, $rad, $measurement= 'miles', $include = null,$account_uuid = null, $scope = false, $registrationId =null)
    {
        try {
            $response = $this->apiService->getByLocation(
                $this->getSubAccountCredentials($account_uuid,$scope,['MZRegistration'=>$registrationId]), $lat, $lon, $rad, $measurement, $include, $account_uuid
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

    /**
     * @param string $scopeResource The name of the resource to scope the call to.
     * @param string $scopeResource_id The Id of the resource to scope the call to.
     * @param string $lat Latitude
     * @param string $lon Longitude
     * @param string $rad Radius
     * @param string $measurement (miles or kilometers)
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param null|string $registrationId The registration If of the user making the request.
     * @return bool|string
     */
    public function getScopeableResourceByLocation($scopeResource, $scopeResource_id,$lat, $lon, $rad, $registrationId, $measurement= 'miles',  $account_uuid = null, $scope = false, $location_id = false)
    {
        try {
            $response = $this->apiService->getScopeableResourceByLocation(
                $this->getSubAccountCredentials(
                    $account_uuid
                    ,$scope
                    ,['MZRegistration'=>$registrationId])

                    ,$scopeResource
                    ,$scopeResource_id
                    ,$lat
                    ,$lon
                    ,$rad
                    ,$measurement
                    ,$account_uuid
                    ,$location_id
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
