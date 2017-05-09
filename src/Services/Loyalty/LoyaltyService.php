<?php

namespace Mobilozophy\MZCAPILaravel\Services\Loyalty;

use Mobilozophy\MZCAPILaravel\Services\Api\Loyalty\LoyaltyAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class LoyaltyService
 * Purpose: Explain what this class does.
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * Last Modified: ${DATE}
 * @package Mobilozophy\MZCAPILaravel\Services\Loyalty
 */
class LoyaltyService extends ServiceBase
{

    /**
     * LoyaltyService constructor.
     *
     * @param LoyaltyAPIService $loyaltyAPIService
     */
    public function __construct(LoyaltyAPIService $loyaltyAPIService) {
        $this->apiService = $loyaltyAPIService;
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



}
