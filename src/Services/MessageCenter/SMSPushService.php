<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\SMSPushAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class SMSPushService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MessageCenter
 */
class SMSPushService extends ServiceBase
{
    /**
     * SMSPushService constructor.
     * @param SMSPushAPIService $SMSPushAPIService
     */
    public function __construct(SMSPushAPIService $SMSPushAPIService)
    {
        $this->apiService = $SMSPushAPIService;
    }
}
