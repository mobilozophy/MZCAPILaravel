<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\Account;

use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\DeviceAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class AccountService
{
    use UsesCredentialsTrait;

    private $deviceApiService;


    /**
     */
    public function __construct(
        DeviceAPIService $deviceApiService
    ) {
        $this->deviceApiService = $deviceApiService;
    }

    /**
     * Add a keyword.
     *
     * @param array $data
     */
    public function add(array $data)
    {

        $response = $this->deviceApiService->add(
            $this->getSubAccountCredentials(), $data
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }



    /**
     * Get keyword.
     *
     * @param integer $keywordId
     */
    public function get($id)
    {
        try {
            $response = $this->deviceApiService->get(
                $this->getSubAccountCredentials(), $id
            );
            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            } else {
                return false;
            }
        } catch (\Exception $e)
        {
            return false;
        }
    }

    /**
     * Get keywords.
     */
    public function getall()
    {
        $response = $this->deviceApiService->getAll(
            $this->getSubAccountCredentials()
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }

    public function delete($id)
    {
        $response = $this->deviceApiService->delete(
            $this->getSubAccountCredentials(), $id
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }


    public function getSubAccountCredentials()
    {
        return new Credentials(
            env('MZCAPI_USER'),
            env('MZCAPI_PASS'),
            [
                'Accept'=>'application/vnd.mzcapi.v2+json',
                'MZAccount'=>env('MZCAPI_ACCT')
            ]
        );
    }
}
