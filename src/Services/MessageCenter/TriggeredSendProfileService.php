<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendProfileAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class TriggeredSendProfileService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $triggeredSendProfileApiService;



    public function __construct(
        TriggeredSendProfileAPIService $triggeredSendProfileAPIService
    ) {
        $this->triggeredSendProfileApiService = $triggeredSendProfileAPIService;
    }

    /**
     * Add a list.
     *
     * @param array $data
     */
    public function add(array $data)
    {

        return $this->triggeredSendProfileApiService->add(
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

        return $this->triggeredSendProfileApiService->update(
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
        return $this->triggeredSendProfileApiService->get(
            $this->getSubAccountCredentials(), $listId
        )->json();
    }

    /**
     * Get lists.
     */
    public function getAll()
    {
        return $this->triggeredSendProfileApiService->getAll(
            $this->getSubAccountCredentials()
        )->json();
    }

    public function delete($id)
    {
        return $this->triggeredSendProfileApiService->delete(
            $this->getSubAccountCredentials(), $id
        )->json();
    }

}
