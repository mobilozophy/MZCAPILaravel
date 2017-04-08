<?php

namespace Mobilozophy\MZCAPILaravel\Services\Loyalty;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Coupon\CouponAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Loyalty\LoyaltyAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class LoyaltyService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $loyaltyApiService;


    /**
     * AccountService constructor.
     *
     */
    public function __construct(
        LoyaltyAPIService $loyaltyAPIService
    ) {
        $this->loyaltyApiService = $loyaltyAPIService;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function add(array $data, $account_uuid = null)
    {

        $response = $this->loyaltyApiService->add(
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

        $response = $this->loyaltyApiService->update(
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
            $response = $this->loyaltyApiService->get(
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
        $response = $this->loyaltyApiService->getAll(
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
        $response = $this->loyaltyApiService->delete(
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
