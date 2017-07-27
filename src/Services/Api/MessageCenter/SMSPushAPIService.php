<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter;


use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class SMSPushAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'message-center/sms/push';


    /**
     * Activate SMS Program
     * @param Credentials $credentials
     * @param             $id
     * @param array       $data
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function activate(Credentials $credentials, $id, array $data)
    {
        $requestUrl = $this->getEndpointRequestUrl($id).'/activate';

        return $this->httpClient->put($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'query' => $data
        ]);
    }

}
