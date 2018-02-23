<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Beacon\RegionAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class RegionService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class RegionService extends ServiceBase
{

    /**
     * RegionService constructor.
     *
     * @param RegionAPIService $regionAPIService
     */
    public function __construct(RegionAPIService $regionAPIService) {
        $this->apiService = $regionAPIService;
    }

}
