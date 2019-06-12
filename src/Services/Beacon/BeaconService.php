<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Beacon\BeaconAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class BeaconService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class BeaconService extends ServiceBase
{
    public function __construct(BeaconAPIService $apiService)
    {
        $this->apiService = $apiService;
    }
}
