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

    /**
     * BeaconService constructor.
     *
     * @param BeaconAPIService $beaconAPIService
     */
    public function __construct(BeaconAPIService $beaconAPIService) {
        $this->apiService = $beaconAPIService;
    }

}
