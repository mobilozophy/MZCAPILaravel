<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\ListAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\SMSPullAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\TrakBeaconAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class SMSPullService extends ServiceBase
{

    public function __construct(
        SMSPullAPIService $SMSPullAPIService
    ) {
        $this->apiService = $SMSPullAPIService;
    }
    
}
