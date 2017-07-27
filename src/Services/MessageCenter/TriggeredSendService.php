<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\TriggeredSendAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class TriggeredSendService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter
 */
class TriggeredSendService extends ServiceBase
{

    /**
     * TriggeredSendService constructor.
     * @param TriggeredSendAPIService $triggeredSendAPIService
     */
    public function __construct(
        TriggeredSendAPIService $triggeredSendAPIService
    ) {
        $this->apiService = $triggeredSendAPIService;
    }

}
