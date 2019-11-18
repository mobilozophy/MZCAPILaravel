<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\ProviderAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class ProviderService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MessageCenter
 */
class ProviderService extends ServiceBase
{
    /**
     * KeywordService constructor.
     * @param ProviderAPIService $service
     */
    public function __construct(ProviderAPIService $service)
    {
        $this->apiService = $service;
    }

    public function getAllServices( 
    	$id,
	    $account_uuid = null,
	    $scope = false,
	    $otherHeaders = [],
	    $user = null,
	    $pass = null
    ) {
        if (!is_null($user) && !is_null($pass)) {
            $response = $this->apiService->getAllServices(
                $this->customSubAccountCredentials(
                    $user,
                    $pass,
                    $account_uuid,
                    $scope,
                    $otherHeaders
                )
            );
        } else {
            $response = $this->apiService->getAllServices(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                )
            );
        }

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }

    public function addService(
    	String $id,
	    array $data,
	    $account_uuid = null,
	    $scope = false,
	    $otherHeaders = []
    ) {
        $response = $this->apiService->addService(
            $this->getSubAccountCredentials(
                $account_uuid,
                $scope,
                $otherHeaders
            ),
            $id,
            $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }

}
