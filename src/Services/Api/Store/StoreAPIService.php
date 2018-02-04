<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Store;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class StoreAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'stores';


    public function getByLocation(Credentials $credentials, $lat, $lon, $rad, $measurement='miles', $include=null,$accountId)
    {
        $requestUrl = $this->getEndpointRequestUrl($accountId).'/'.$lat.'/'.$lon.'/'.$rad.(!is_null($include)?"?include=$include":'');
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    public function getScopeableResourceByLocation(Credentials $credentials, $scope, $scope_id=false, $lat, $lon, $rad, $measurement='miles',$accountId)
    {
        $scope_id_url = ($scope_id)?$scope_id.'/':'';
        $requestUrl =
            $this->getEndpointRequestUrl($accountId)."/scope/$scope/".$scope_id_url.$lat.'/'.$lon.'/'.$rad;
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    public function pairBeaconsToLocation(Credentials $credentials, $location_id, $device_serial, $device_manuf)
    {

        $requestUrl =
            $this->getEndpointRequestUrl()."/$location_id/beacons/$device_serial/manufacturer/$device_manuf";
        return $this->httpClient->put($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);



    }

}
