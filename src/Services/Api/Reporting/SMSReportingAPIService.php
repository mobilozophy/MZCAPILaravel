<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Reporting;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
//use Log;

class SMSReportingAPIService extends AbstractAPIService
{
    const ENDPOINT = 'message-center/reports';

//    /**
//     * Send a request to add a new code.
//     *
//     * @param Credentials $credentials
//     * @param array $keyword
//     *
//     * @return \GuzzleHttp\Promise\PromiseInterface
//     */
//    public function add(Credentials $credentials, array $keyword)
//    {
//        $requestUrl = $this->getEndpointRequestUrl();
//
//
//        return $this->httpClient->post($requestUrl, [
//            'headers' => $credentials->getHeaders(),
//            'auth' => $credentials->toArray(),
//            'form_params' => $keyword
//        ]);
//    }


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


    /**
     * Get base API request URL with additional segments.
     *
     * @param mixed $segments
     */
    protected function getBaseRequestUrl($segments = null)
    {
        if (is_array($segments)) {
            $segments = implode('/', $segments);
        }

        $baseUrl = config('services.mz_v2_api.url');

        return $baseUrl . '/' . $segments;
    }
}
