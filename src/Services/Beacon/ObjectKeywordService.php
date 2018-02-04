<?php

namespace Mobilozophy\MZCAPILaravel\Services\Beacon;

use Mobilozophy\MZCAPILaravel\Services\Api\Beacon\ObjectKeywordAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class ObjectKeywordService
 * @package Mobilozophy\MZCAPILaravel\Services\Beacon
 */
class ObjectKeywordService extends ServiceBase
{

    public function __construct(ObjectKeywordAPIService $apiService) {
        $this->apiService = $apiService;
    }

}
