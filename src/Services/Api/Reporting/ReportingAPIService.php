<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Reporting;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

class ReportingAPIService extends AbstractAPIService
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
//        dd($requestUrl);
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    public function getRegistrationsReport(Credentials $credentials, $type, $timespan)
    {

        $requestUrl = $this->getEndpointRequestUrl(['transactions',$type,$timespan]);
//        dd($requestUrl);
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    /**
     * Get base API request URL with additional segments.
     *
     * @param mixed $segments
     *
     * @return string
     */
    protected function getBaseRequestUrl($segments = null)
    {
        if (is_array($segments)) {
            $segments = implode('/', $segments);
        }

        $baseUrl = env('MZCAPI_BASEURL');

        return $baseUrl . '/' . $segments;
    }
}
