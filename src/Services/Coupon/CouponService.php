<?php

namespace Mobilozophy\MZCAPILaravel\Services\Coupon;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Coupon\CouponAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class CouponService extends ServiceBase
{

    public function __construct( CouponAPIService $couponAPIService) {
        $this->apiService = $couponAPIService;
    }

    /**
     * Get - GET by ID
     * @param      $id
     * @param null $account_uuid
     *
     * @return bool
     */
    public function get($id,$account_uuid = null, $scope = false, $otherHeaders=[], $storeId = null)
    {
        try {
            $response = $this->apiService->get(
                $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders), $id, $storeId
            );
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        } catch (\Exception $e)
        {
            return false;
        }
    }

    /**
     * Get - GET by ID
     * @param      $id
     * @param null $account_uuid
     *
     * @return bool
     */
    public function getAllForAvailability($availability, $account_uuid = null, $scope = false, $otherHeaders=[])
{
    $response = $this->apiService->getAllForAvailability(
        $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders), $availability
    );
    if ($response->getStatusCode() == 200) {
        return json_decode($response->getBody()->getContents());
    } else
    {
        return false;
    }
}



}
