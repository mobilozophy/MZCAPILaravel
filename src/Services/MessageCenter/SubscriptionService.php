<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\SubscriptionAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class SubscriptionService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter
 */
class SubscriptionService extends ServiceBase
{

    /**
     * SubscriptionService constructor.
     * @param SubscriptionAPIService $subscriptionAPIService
     */
    public function __construct(
        SubscriptionAPIService $subscriptionAPIService
    ) {
        $this->apiService = $subscriptionAPIService;
    }


}
