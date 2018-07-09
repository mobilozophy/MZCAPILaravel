<?php

namespace Mobilozophy\MZCAPILaravel\Services\Login;

use Mobilozophy\MZCAPILaravel\Services\Api\Login\LoginAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Illuminate\Support\Facades\Log;

/**
 * Class LoginService
 * @author Angel Gonzalez <agonzalez@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Login
 */
class LoginService extends ServiceBase
{

    /**
     * LoginService constructor.
     * @param LoginAPIService $loyaltyAPIService
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
    public function get($id, $account_uuid= null, $scope = false, $otherHeaders=[], $storeId = null)
    {
        try {
            $response = $this->apiService->get($this->getSubAccountCredentials(null,$scope, $otherHeaders),$id, []);

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

    /**
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @param string $storeId The Id of the store.
     *
     * @return bool|mixed
     */
    public function apiLoginWithDetails($user, $pass, $scope = false, $otherHeaders=[], $storeId = null)
    {
        try
        {
            $response = $this->apiService->confirmLogin($this->customSubAccountCredentials($user, $pass));

            Log::info(json_encode($response));

            if ($response->getStatusCode() == 200)
            {
                return json_decode($response->getBody()->getContents());
            }
            else
            {
                return false;
            }
        }
        catch (\Exception $e)
        {
            Log::info($e->getMessage());
            return false;
        }
    }



}
