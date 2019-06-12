<?php

namespace Mobilozophy\MZCAPILaravel\Services\ValidationToken;

use Mobilozophy\MZCAPILaravel\Services\Api\ValidationToken\ValidationTokenAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class ValidationTokenService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\ValidationToken
 */
class ValidationTokenService extends ServiceBase
{
    /**
     * ValidationTokenService constructor.
     * @param ValidationTokenAPIService $validationTokenAPIService
     */
    public function __construct(
        ValidationTokenAPIService $validationTokenAPIService
    ) {
        $this->apiService = $validationTokenAPIService;
    }

    /**
     * @param string $resource The name of the resource to scope token to.
     * @param int $resource_id The Id of the resocurce to scope token to.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @return bool|mixed
     */
    public function getToken(
        $resource,
        $resource_id,
        $type = 'QR Code',
        $code = null,
        $account_uuid = null,
        $scope = false
    ) {
        try {
            //Gather resource and resource id; compose url
            $resources = $resource . '/' . $resource_id . '?type=' . $type;
            if (!is_null($code)) {
                $resources .= '&code=' . $code;
            }

            $response = $this->apiService->get(
                $this->getSubAccountCredentials($account_uuid, $scope),
                $resources
            );
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param string $token The token to lookup.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @return bool|mixed
     */
    public function getTokenInfo($token, $account_uuid = null, $scope = false)
    {
        try {
            $response = $this->apiService->getByToken(
                $this->getSubAccountCredentials($account_uuid, $scope),
                $token
            );
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
