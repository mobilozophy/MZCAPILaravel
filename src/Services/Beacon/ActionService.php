<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Beacon\ActionAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class ActionService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class ActionService extends ServiceBase
{

    public function __construct(ActionAPIService $apiService) {
        $this->apiService = $apiService;
    }

}
