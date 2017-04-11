<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\DeviceAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class DeviceService extends ServiceBase
{

    public function __construct(
        DeviceAPIService $deviceApiService
    ) {
        $this->apiService = $deviceApiService;
    }



}
