<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Redemption;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class RedemptionAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'redemptions';

    public function generateCode(Credentials $credentials, $scope, $scope_id, $registration_id,$params = null)
    {
        $requestUrl = $this->getEndpointRequestUrl([$scope,$scope_id,'registration',$registration_id]);

        return $this->httpClient->post($requestUrl, [
            'headers'     => $credentials->getHeaders(),
            'auth'        => $credentials->toArray(),
            'form_params' => $params
        ]);

    }




}
