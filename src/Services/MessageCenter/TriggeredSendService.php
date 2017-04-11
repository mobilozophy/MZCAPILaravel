<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class TriggeredSendService extends ServiceBase
{

    public function __construct(
        TriggeredSendAPIService $triggeredSendAPIService
    ) {
        $this->apiService = $triggeredSendAPIService;
    }

}
