<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Reporting;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class ReportingAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'reports';


    /**
     * Send a request to retrieve a store.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTransactionReport(Credentials $credentials, $type, $timespan)
    {

        $requestUrl = $this->getEndpointRequestUrl(['transactions',$type,$timespan]);
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    public function getRegistrationsReport(Credentials $credentials, $type, $timespan)
    {

        $requestUrl = $this->getEndpointRequestUrl(['registrations',$type,$timespan]);
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    public function getMerchantReport(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl('merchant');

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);

    }

    public function getConsumerActivityReport(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl('consumer/activity');

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);

    }
}
