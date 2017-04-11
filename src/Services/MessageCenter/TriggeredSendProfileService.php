<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\TriggeredSendProfileAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class TriggeredSendProfileService extends ServiceBase
{

    public function __construct(
        TriggeredSendProfileAPIService $triggeredSendProfileAPIService
    ) {
        $this->apiService = $triggeredSendProfileAPIService;
    }


}
