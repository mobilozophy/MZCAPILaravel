<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\TriggeredSendProfileAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class TriggeredSendProfileService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter
 */
class TriggeredSendProfileService extends ServiceBase
{

    /**
     * TriggeredSendProfileService constructor.
     * @param TriggeredSendProfileAPIService $triggeredSendProfileAPIService
     */
    public function __construct(
        TriggeredSendProfileAPIService $triggeredSendProfileAPIService
    ) {
        $this->apiService = $triggeredSendProfileAPIService;
    }


}
