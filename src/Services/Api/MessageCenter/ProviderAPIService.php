<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class ProviderAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'message-center/providers';


    public function getAllServices($credentials, String $id)
    {
        $requestUrl = $this->getEndpointRequestUrl([$id, 'services']);

        return $this->httpClient->get(
            $requestUrl,
            $this->generateOptions($credentials)
        );
    }

    public function getServiceById($credentials, String $provider, $service, $data = false)
    {
        $requestUrl = $this->getEndpointRequestUrl([$provider, 'services', $service]);
        if ($data)
        {
            $requestUrl .= '?' . $data;
        }

        return $this->httpClient->get(
            $requestUrl,
            $this->generateOptions($credentials)
        );
    }


    public function addService($credentials, String $id, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl([$id, 'services']);

        return $this->httpClient->post(
            $requestUrl,
            $this->generateOptions($credentials, [
                'form_params' => $params
            ])
        );
    }

    public function searchService($credentials, String $id, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl([$id, 'services','search']);

        return $this->httpClient->post(
            $requestUrl,
            $this->generateOptions($credentials, [
                'form_params' => $params
            ])
        );
    }
}
