<?php

namespace Mobilozophy\MZCAPILaravel\Services\Coupon;

use Mobilozophy\MZCAPILaravel\Services\Api\Coupon\CouponAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class CouponService extends ServiceBase
{

    /**
     * CouponService constructor.
     * @param CouponAPIService $couponAPIService
     */
    public function __construct( CouponAPIService $couponAPIService) {
        $this->apiService = $couponAPIService;
    }

    /**
     * @param string $id Id (UUID) of the record to be retrieved.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @param string $storeId The Store Id.
     * @return bool|mixed
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
     * @param string $availability The availability of the coupon to search.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @return bool|mixed
     */
    public function getAllForAvailability($availability, $account_uuid = null, $scope = false, $otherHeaders=[], $user = null, $pass = null)
    {
        try {
            if( (!is_null($user)) && (!is_null($pass)))
            {
                $response = $this->apiService->getAllForAvailability(
                    $this->customSubAccountCredentials($user, $pass, $account_uuid,$scope, $otherHeaders), $availability
                );

            }
            else
            {
                $response = $this->apiService->getAllForAvailability(
                    $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders), $availability
                );
            }

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else
            {
                return false;
            }
        } catch (\Exception $e)
        {
            return false;
        }
    }



}
