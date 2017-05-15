<?php

namespace Mobilozophy\MZCAPILaravel\Services\ValidationToken;

use Mobilozophy\MZCAPILaravel\Services\Api\ValidationToken\ValidationTokenAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class ValidationTokenService extends ServiceBase
{

    public function __construct(
        ValidationTokenAPIService $validationTokenAPIService
    ) {
        $this->apiService = $validationTokenAPIService;
    }

    /**
     * @param      $resource
     * @param      $resource_id
     * @param null $account_uuid
     * @param bool $scope
     *
     * @return bool
     */
    public function getToken($resource, $resource_id, $account_uuid = null, $scope = false)
    {
        try {
            $response = $this->apiService->get(
                $this->getSubAccountCredentials($account_uuid,$scope), $resource,$resource_id
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

    public function getTokenInfo($token, $account_uuid = null, $scope = false)
    {
        try {
            $response = $this->apiService->getByToken(
                $this->getSubAccountCredentials($account_uuid,$scope), $token
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
