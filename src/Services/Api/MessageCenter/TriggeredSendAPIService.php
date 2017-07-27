<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class TriggeredSendAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'message-center/triggered-send';

    /**
     * Send a request to add a new list.
     * @param Credentials $credentials
     * @param             $id
     * @param             $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
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

}
