<?php

namespace Mobilozophy\MZCAPILaravel\Services\Loyalty;

use Mobilozophy\MZCAPILaravel\Services\Api\Loyalty\LoyaltyAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class LoyaltyService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Loyalty
 */
class LoyaltyService extends ServiceBase
{

    /**
     * LoyaltyService constructor.
     * @param LoyaltyAPIService $loyaltyAPIService
     */
    public function __construct(LoyaltyAPIService $loyaltyAPIService) {
        $this->apiService = $loyaltyAPIService;
    }

    /**
     * @param string $id Id (UUID) of the record to be retrieved.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @param string $storeId The Id of the store.
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



}
