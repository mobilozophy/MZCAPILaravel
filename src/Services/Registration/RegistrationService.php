<?php

namespace Mobilozophy\MZCAPILaravel\Services\Registration;

use Mobilozophy\MZCAPILaravel\Services\Api\Registration\RegistrationAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class LoyaltyService
 * Purpose: Explain what this class does.
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * Last Modified: ${DATE}
 * @package Mobilozophy\MZCAPILaravel\Services\Loyalty
 */
class RegistrationService extends ServiceBase
{


    public function __construct(RegistrationAPIService $registrationAPIService) {
        $this->apiService = $registrationAPIService;
    }

    public function login(array $data, $account_uuid = null)
    {

        $response = $this->apiService->login(
            $this->getSubAccountCredentials($account_uuid), $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }

    public function loginWithMerchantIdentifier(array $data, $account_uuid = null)
    {

        $response = $this->apiService->loginWithMerchantIdentifier(
            $this->getSubAccountCredentials($account_uuid), $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }

}
