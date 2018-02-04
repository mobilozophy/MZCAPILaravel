<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Beacon\FloorAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class FloorService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class FloorService extends ServiceBase
{

    public function __construct(FloorAPIService $apiService) {
        $this->apiService = $apiService;
    }

}
