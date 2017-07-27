<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Reporting;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
//use Log;

class SMSReportingAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'message-center/reports';


    public function getSubscriptions(Credentials $credentials){
        $requestUrl = $this->getEndpointRequestUrl().'/subscription';

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    public function getSubscriptionConfirmation(Credentials $credentials, $lookupVal, $lookupValType){
        $requestUrl = $this->getEndpointRequestUrl().'/subscription-confirmation/'.$lookupVal.'/'.$lookupValType;

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

}
