<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Beacon\AreaAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class AreaService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class AreaService extends ServiceBase
{
    public function __construct(AreaAPIService $apiService)
    {
        $this->apiService = $apiService;
    }
}
