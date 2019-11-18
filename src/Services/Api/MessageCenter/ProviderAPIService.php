<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class ProviderAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'message-center/providers';


    public function getAllServices(Credentials $credentials, String $id)
    {
        $requestUrl = $this->getEndpointRequestUrl([$id, 'services']);

        return $this->httpClient->get(
            $requestUrl,
            $this->generateOptions($credentials)
        );
    }

    public function addService(Credentials $credentials, string $id, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl([$id, 'services']);

        return $this->httpClient->post(
            $requestUrl,
            $this->generateOptions($credentials, [
                'form_params' => $params
            ])
        );
    }
}
