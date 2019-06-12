<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\SMSPullAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class SMSPullService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MessageCenter
 */
class SMSPullService extends ServiceBase
{
    /**
     * SMSPullService constructor.
     * @param SMSPullAPIService $SMSPullAPIService
     */
    public function __construct(SMSPullAPIService $SMSPullAPIService)
    {
        $this->apiService = $SMSPullAPIService;
    }
}
