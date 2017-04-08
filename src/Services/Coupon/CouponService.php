<?php

namespace Mobilozophy\MZCAPILaravel\Services\Coupon;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Coupon\CouponAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class CouponService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $couponApiService;


    /**
     * AccountService constructor.
     *
     */
    public function __construct(
        CouponAPIService $couponAPIService
    ) {
        $this->couponApiService = $couponAPIService;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function add(array $data, $account_uuid = null)
    {

        $response = $this->couponApiService->add(
            $this->getSubAccountCredentials($account_uuid), $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function update($id, array $data, $account_uuid = null)
    {

        $response = $this->couponApiService->update(
            $this->getSubAccountCredentials($account_uuid), $id, $data, $account_uuid
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


    /**
     * @param $id
     *
     * @return bool
     */
    public function get($id,$account_uuid = null)
    {
        try {
            $response = $this->couponApiService->get(
                $this->getSubAccountCredentials($account_uuid), $id
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
     * @return bool
     */
    public function getall($account_uuid = null)
    {
        $response = $this->couponApiService->getAll(
            $this->getSubAccountCredentials($account_uuid)
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id, $account_uuid = null)
    {
        $response = $this->couponApiService->delete(
            $this->getSubAccountCredentials($account_uuid), $id
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }


}
