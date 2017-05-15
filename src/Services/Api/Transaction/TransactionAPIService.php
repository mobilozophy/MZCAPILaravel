<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Transaction;

use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class TransactionAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'transactions';

    public function loyalty(Credentials $credentials, $id, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl(['loyalty',$id]);

        return $this->httpClient->post($requestUrl, [
            'headers'     => $credentials->getHeaders(),
            'auth'        => $credentials->toArray(),
            'form_params' => $params
        ]);

    }

    public function coupon(Credentials $credentials, $id, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl(['coupon',$id]);

        return $this->httpClient->post($requestUrl, [
            'headers'     => $credentials->getHeaders(),
            'auth'        => $credentials->toArray(),
            'form_params' => $params
        ]);

    }


}
