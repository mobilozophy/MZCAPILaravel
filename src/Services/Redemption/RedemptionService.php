<?php

namespace Mobilozophy\MZCAPILaravel\Services\Redemption;

use Mobilozophy\MZCAPILaravel\Services\Api\Redemption\RedemptionAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class LoyaltyService
 * Purpose: Explain what this class does.
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * Last Modified: ${DATE}
 * @package Mobilozophy\MZCAPILaravel\Services\Loyalty
 */
class RedemptionService extends ServiceBase
{


    public function __construct(RedemptionAPIService $redemptionAPIService) {
        $this->apiService = $redemptionAPIService;
    }

    public function generateCode($resourceScope, $resourceScope_id, $registration_id, $account_uuid = null, $scope = false, $otherHeaders)
    {

        $response = $this->apiService->generateCode(
            $this->getSubAccountCredentials($account_uuid,$scope,$otherHeaders),$resourceScope,$resourceScope_id,$registration_id
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }




}
