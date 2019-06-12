<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\DeviceAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class DeviceService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter
 */
class DeviceService extends ServiceBase
{
    /**
     * DeviceService constructor.
     * @param DeviceAPIService $deviceApiService
     */
    public function __construct(DeviceAPIService $deviceApiService)
    {
        $this->apiService = $deviceApiService;
    }
}
