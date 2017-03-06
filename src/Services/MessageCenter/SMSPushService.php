<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\ListAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\SMSPushAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\TrakBeaconAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class SMSPushService
{
    use UsesCredentialsTrait;

    private $SMSPushAPIService;


    /**
     * @param Mobilozophy\MZCAPILaravel\Services\Api\ListAPIService $listApiService
     */
    public function __construct(
        SMSPushAPIService $SMSPushAPIService
    ) {
        $this->SMSPushAPIService = $SMSPushAPIService;
    }

    /**
     * Add a list.
     *
     * @param array $data
     */
    public function add(array $data)
    {

        return $this->SMSPushAPIService->add(
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

        return $this->SMSPushAPIService->update(
            $this->getSubAccountCredentials(),$id, $data
        )->json();
    }

    public function activate(array $data, $id)
    {

        return $this->SMSPushAPIService->activate(
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
        return $this->SMSPushAPIService->get(
            $this->getSubAccountCredentials(), $listId
        )->json();
    }

    /**
     * Get lists.
     */
    public function getAll()
    {
        return $this->SMSPushAPIService->getAll(
            $this->getSubAccountCredentials()
        )->json();
    }

    public function delete($id)
    {
        return $this->SMSPushAPIService->delete(
            $this->getSubAccountCredentials(), $id
        )->json();
    }


    public function getSubAccountCredentials()
    {
        //This function needs to replace the config user names and PW with the
        //API credentials found in the database. Also need merchant_ID stored somewhere
        //reliable during this execution.
        try{
            $mr  = new MerchantsRepository(new Merchant());
            $wlr  = new WhiteLabelersRepository(new WhiteLabeler());
            $ams = new ActiveMerchantService($mr, new AbilityService($mr, $wlr));

            $am = $ams->getActiveMerchant();

        }catch(Exception $e)
        {
            return false;
        }

        $deets = Merchant::where('_kf_Merchant_ID', '=', $am->_kf_Merchant_ID)->first();

        return new Credentials(
            $deets->v2_token_name,//config('services.trak_beacon.username'),
            $deets->v2_token_pass,//config('services.trak_beacon.password')
            [
                'Accept'=>'application/vnd.mzcapi.v2+json',
                'MZAccount'=>$deets->v2_token_account_id
            ]
        );

    }
}
