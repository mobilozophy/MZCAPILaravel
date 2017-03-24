<?php

namespace Mobilozophy\MZCAPILaravel\Services\Store;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Store\StoreAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class StoreService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $storeApiService;


    /**
     * AccountService constructor.
     *
     */
    public function __construct(
        StoreAPIService $storeAPIService
    ) {
        $this->storeApiService = $storeAPIService;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function add(array $data, $account_uuid = null)
    {

        $response = $this->storeApiService->add(
            $this->getSubAccountCredentials($account_uuid), $data
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
    public function get($id,$account_uuid = null)
    {
        try {
            $response = $this->storeApiService->get(
                $this->getSubAccountCredentials($account_uuid), $id
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
    public function getall($account_uuid = null)
    {
        $response = $this->storeApiService->getAll(
            $this->getSubAccountCredentials($account_uuid)
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
    public function delete($id, $account_uuid = null)
    {
        $response = $this->storeApiService->delete(
            $this->getSubAccountCredentials($account_uuid), $id
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }


}
