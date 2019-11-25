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
	    $otherHeaders = []
    ) {
            $response = $this->apiService->getAllServices(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                ), $id
            );

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }

    public function getServiceById(
        $provider_id,
        $service_id,
        $account_uuid = null,
        $scope = false,
        $otherHeaders = [],
        $data = []
    ) {
        $response = $this->apiService->getServiceById(
            $this->getSubAccountCredentials(
                $account_uuid,
                $scope,
                $otherHeaders
            ), $provider_id, $service_id, $data
        );

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

    public function searchService(
        String $id,
        array $data,
        $account_uuid = null,
        $scope = false,
        $otherHeaders = []
    ) {
        $response = $this->apiService->searchService(
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
