<?php

namespace Mobilozophy\MZCAPILaravel\Services\Registration;

use Mobilozophy\MZCAPILaravel\Services\Api\Registration\RegistrationAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class RegistrationService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Registration
 */
class RegistrationService extends ServiceBase
{
    /**
     * RegistrationService constructor.
     * @param RegistrationAPIService $registrationAPIService
     */
    public function __construct(RegistrationAPIService $registrationAPIService)
    {
        $this->apiService = $registrationAPIService;
    }

    /**
     * @param array $data Data to validate login.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @return bool|mixed
     */
    public function login(array $data, $account_uuid = null)
    {
        $response = $this->apiService->login(
            $this->getSubAccountCredentials($account_uuid),
            $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }

    /**
     * @param array $data
     * @param null $account_uuid
     * @return bool|mixed
     */
    public function loginWithMerchantIdentifier(
        array $data,
        $account_uuid = null
    ) {
        $response = $this->apiService->loginWithMerchantIdentifier(
            $this->getSubAccountCredentials($account_uuid),
            $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }

    /**
     * @param array $data Data to validate login.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @return bool|mixed
     */
    public function locateRegisteredUserByEmail(
        array $data,
        $account_uuid = null
    ) {
        $response = $this->apiService->locateRegisteredUserByEmail(
            $this->getSubAccountCredentials($account_uuid),
            $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }

    public function twoFactorTestAndAuth(
        array $data,
        $account_uuid = null
    ) {
        $response = $this->apiService->$response = $this->apiService->locateRegisteredUserByEmail(
            $this->getSubAccountCredentials($account_uuid),
            $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }
}
