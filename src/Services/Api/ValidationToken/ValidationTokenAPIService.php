<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\ValidationToken;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class ValidationTokenAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'validation-token';


    public function getByToken(Credentials $credentials, $token)
    {
        $requestUrl = $this->getEndpointRequestUrl([$token]);

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

}
