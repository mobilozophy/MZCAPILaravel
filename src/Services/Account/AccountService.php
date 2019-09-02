<?php

namespace Mobilozophy\MZCAPILaravel\Services\Account;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class AccountService
 * @package Mobilozophy\MZCAPILaravel\Services\Account
 */
class AccountService extends ServiceBase
{
    /**
     * AccountService constructor.
     *
     * @param AccountAPIService $accountAPIService
     */
    public function __construct(AccountAPIService $accountAPIService)
    {
        $this->apiService = $accountAPIService;
    }

    public function getApplication($accountUuid, $scope = false, $otherHeaders = [])
    {
        try {
            $response = $this->apiService->getApplication(
                $this->getSubAccountCredentials($accountUuid, $scope, $otherHeaders),
                $accountUuid
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            }

            return $response->getBody()->getContents();

        } catch (\Exception $e) {
            return false;
        }
    }
}
