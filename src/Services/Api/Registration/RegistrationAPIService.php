<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Registration;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class RegistrationAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'registration';

    public function login(Credentials $credentials, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl().'/login';

        return $this->httpClient->post($requestUrl, [
            'headers'     => $credentials->getHeaders(),
            'auth'        => $credentials->toArray(),
            'form_params' => $params
        ]);

    }

    public function loginWithMerchantIdentifier(Credentials $credentials, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl().'/login/merchant_identifier';

        return $this->httpClient->post($requestUrl, [
            'headers'     => $credentials->getHeaders(),
            'auth'        => $credentials->toArray(),
            'form_params' => $params
        ]);

    }

    public function locateRegisteredUserByEmail(Credentials $credentials, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl().'/lookup/email';

        return $this->httpClient->post($requestUrl, [
            'headers'     => $credentials->getHeaders(),
            'auth'        => $credentials->toArray(),
            'form_params' => $params
        ]);

    }


}
