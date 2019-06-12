<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\ListAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class ListService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MessageCenter
 */
class ListService extends ServiceBase
{
    /**
     * ListService constructor.
     * @param ListAPIService $listApiService
     */
    public function __construct(ListAPIService $listApiService)
    {
        $this->apiService = $listApiService;
    }
}
