<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

class TriggeredSendAPIService extends AbstractAPIService
{
    const ENDPOINT = 'message-center/triggered-send';

    /**
     * Send a request to add a new list.
     *
     * @param Credentials $credentials
     * @param array       $list
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function send(Credentials $credentials, $id, $payload)
    {
        $requestUrl = $this->getEndpointRequestUrl().'/'.$id;

        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'json' => $payload
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

        $baseUrl = env('MZCAPI_BASEURL');

        return $baseUrl . '/' . $segments;
    }
}
