<?php

namespace Mobilozophy\MZCAPILaravel\Services\Login;

use Mobilozophy\MZCAPILaravel\Services\Api\Loyalty\LoginAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class LoginService
 * @author Angel Gonzalez <agonzalez@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Login
 */
class LoginService extends ServiceBase
{

    /**
     * LoyaltyService constructor.
     * @param LoyaltyAPIService $loyaltyAPIService
     */
    public function __construct(LoginAPIService $loginAPIService) {
        $this->apiService = $loginAPIService;
    }

    /**
     * @param string $id Id (UUID) of the record to be retrieved.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @param string $storeId The Id of the store.
     * @return bool|mixed
     */
    public function get($scope = false, $otherHeaders=[], $storeId = null)
    {
        try {
            $response = $this->apiService->get($this->getSubAccountCredentials(null,$scope, $otherHeaders));

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            }
            else
            {
                return false;
            }
        } catch (\Exception $e)
        {
            return false;
        }
    }



}
