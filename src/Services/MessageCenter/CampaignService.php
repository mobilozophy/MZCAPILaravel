<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CampaignAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\ListAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class CampaignService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $campaignApiService;


    /**
     * CampaignService constructor.
     *
     * @param CampaignAPIService $campaignAPIService
     */
    public function __construct(
        CampaignAPIService $campaignAPIService
    ) {
        $this->campaignApiService = $campaignAPIService;
    }


    public function add(array $data)
    {

        return $this->campaignApiService->add(
            $this->getSubAccountCredentials(), $data
        )->json();
    }


    /**
     * @param array $data
     *
     * @return mixed
     */
    public function update(array $data, $id)
    {

        return $this->campaignApiService->update(
            $this->getSubAccountCredentials(),$id, $data
        )->json();
    }




    public function get($listId)
    {
        return $this->campaignApiService->get(
            $this->getSubAccountCredentials(), $listId
        )->json();
    }

    /**
     * Get lists.
     */
    public function getAll()
    {
        return $this->campaignApiService->getAll(
            $this->getSubAccountCredentials()
        )->json();
    }

    public function delete($id)
    {
        return $this->campaignApiService->delete(
            $this->getSubAccountCredentials(), $id
        )->json();
    }

}
