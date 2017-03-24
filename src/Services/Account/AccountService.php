<?php

namespace Mobilozophy\MZCAPILaravel\Services\Account;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class AccountService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $accountApiService;


    /**
     * AccountService constructor.
     *
     * @param AccountAPIService $accountAPIService
     */
    public function __construct(
        AccountAPIService $accountAPIService
    ) {
        $this->accountApiService = $accountAPIService;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function add(array $data)
    {

        $response = $this->accountApiService->add(
            $this->getSubAccountCredentials(), $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


    /**
     * @param $id
     *
     * @return bool
     */
    public function get($id)
    {
        try {
            $response = $this->accountApiService->get(
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
     * @return bool
     */
    public function getall()
    {
        $response = $this->accountApiService->getAll(
            $this->getSubAccountCredentials()
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $response = $this->accountApiService->delete(
            $this->getSubAccountCredentials(), $id
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }


}
