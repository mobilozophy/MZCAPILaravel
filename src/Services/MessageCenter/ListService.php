<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\ListAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class ListService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $listApiService;


    /**
     * @param Mobilozophy\MZCAPILaravel\Services\Api\ListAPIService $listApiService
     */
    public function __construct(
        ListAPIService $listApiService
    ) {
        $this->listApiService = $listApiService;
    }

    /**
     * Add a list.
     *
     * @param array $data
     */
    public function addList(array $data)
    {

        return $this->listApiService->add(
            $this->getSubAccountCredentials(), $data
        )->json();
    }


    /**
     * Add a list.
     *
     * @param array $data
     */
    public function update(array $data)
    {

        return $this->listApiService->update(
            $this->getSubAccountCredentials(), $data
        )->json();
    }



    /**
     * Get list.
     *
     * @param integer $listId
     */
    public function getList($listId)
    {
        return $this->listApiService->get(
            $this->getSubAccountCredentials(), $listId
        )->json();
    }

    /**
     * Get lists.
     */
    public function getLists()
    {
        return $this->listApiService->getAll(
            $this->getSubAccountCredentials()
        )->json();
    }

    public function delete($id)
    {
        return $this->listApiService->delete(
            $this->getSubAccountCredentials(), $id
        )->json();
    }

}
