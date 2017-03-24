<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\ListAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\SMSPullAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\TrakBeaconAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class SMSPullService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $SMSPullAPIService;


    /**
     * SMSPullService constructor.
     *
     * @param SMSPullAPIService $SMSPullAPIService
     */
    public function __construct(
        SMSPullAPIService $SMSPullAPIService
    ) {
        $this->SMSPullAPIService = $SMSPullAPIService;
    }

    /**
     * Add a list.
     *
     * @param array $data
     */
    public function add(array $data)
    {

        return $this->SMSPullAPIService->add(
            $this->getSubAccountCredentials(), $data
        )->json();
    }


    /**
     * Add a list.
     *
     * @param array $data
     */
    public function update(array $data, $id)
    {

        return $this->SMSPullAPIService->update(
            $this->getSubAccountCredentials(),$id, $data
        )->json();
    }

    public function activate(array $data, $id)
    {

        return $this->SMSPullAPIService->activate(
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
        return $this->SMSPullAPIService->get(
            $this->getSubAccountCredentials(), $listId
        )->json();
    }

    /**
     * Get lists.
     */
    public function getAll()
    {
        return $this->SMSPullAPIService->getAll(
            $this->getSubAccountCredentials()
        )->json();
    }

    public function delete($id)
    {
        return $this->SMSPullAPIService->delete(
            $this->getSubAccountCredentials(), $id
        )->json();
    }
    
}
