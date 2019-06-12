<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Beacon\ScheduleKeywordAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class RegionService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class ScheduleKeywordService extends ServiceBase
{
    public function __construct(ScheduleKeywordAPIService $apiService)
    {
        $this->apiService = $apiService;
    }
}
