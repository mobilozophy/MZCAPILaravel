<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Beacon\ScheduleAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class RegionService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class ScheduleService extends ServiceBase
{
    public function __construct(ScheduleAPIService $apiService)
    {
        $this->apiService = $apiService;
    }
}
