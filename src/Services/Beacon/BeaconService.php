<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\BeaconAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class BeaconService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class AccountService extends ServiceBase
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
