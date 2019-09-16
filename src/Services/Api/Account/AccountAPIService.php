<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Account;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class AccountAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'accounts';

    public function getApplication(Credentials $credentials, $accountUuid)
    {
        $requestUrl = $this->composeGetApplicationRequestUrl($accountUuid);
        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    public function composeGetApplicationRequestUrl($accountUuid)
    {
        $requestUrl = $this->getEndpointRequestUrl([$accountUuid, 'app']);
        return $requestUrl;
    }
}
