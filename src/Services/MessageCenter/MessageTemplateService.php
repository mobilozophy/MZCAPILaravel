<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\MessageTemplateAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\TrakBeaconAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class MessageTemplateService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $messageTemplateApiService;


    /**
     * @param Mobilozophy\MZCAPILaravel\Services\Api\ListAPIService $listApiService
     */
    public function __construct(
        MessageTemplateAPIService $messageTemplateAPIService
    ) {
        $this->messageTemplateApiService = $messageTemplateAPIService;
    }

    /**
     * Add a list.
     *
     * @param array $data
     */
    public function add(array $data)
    {

        return $this->messageTemplateApiService->add(
            $this->getSubAccountCredentials(), $data
        )->json();
    }


    /**
     * Add a list.
     *
     * @param array $data
     */
    public function update($id,array $data)
    {

        return $this->messageTemplateApiService->update(
            $this->getSubAccountCredentials(),$id, $data
        )->json();
    }



    /**
     * Get list.
     *
     * @param integer $listId
     */
    public function get($listId)
    {
        return $this->messageTemplateApiService->get(
            $this->getSubAccountCredentials(), $listId
        )->json();
    }

    /**
     * Get lists.
     */
    public function getAll()
    {
        return $this->messageTemplateApiService->getAll(
            $this->getSubAccountCredentials()
        )->json();
    }

    public function delete($id)
    {
        return $this->messageTemplateApiService->delete(
            $this->getSubAccountCredentials(), $id
        )->json();
    }

}
