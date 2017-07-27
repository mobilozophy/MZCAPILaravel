<?php

namespace Mobilozophy\MZCAPILaravel\Services\Redemption;

use Mobilozophy\MZCAPILaravel\Services\Api\Redemption\RedemptionAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class RedemptionService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Redemption
 */
class RedemptionService extends ServiceBase
{

    /**
     * RedemptionService constructor.
     * @param RedemptionAPIService $redemptionAPIService
     */
    public function __construct(RedemptionAPIService $redemptionAPIService) {
        $this->apiService = $redemptionAPIService;
    }

    /**
     * @param string $resourceScope The name of the resource to scope the call to.
     * @param string $resourceScope_id The Id of the resource to scope the call to.
     * @param null|string $registration_id The registration If of the user making the request.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @return bool|mixed
     */
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
