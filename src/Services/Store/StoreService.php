<?php

namespace Mobilozophy\MZCAPILaravel\Services\Store;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Store\StoreAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class StoreService extends ServiceBase
{

    public function __construct(
        StoreAPIService $storeAPIService
    ) {
        $this->apiService = $storeAPIService;
    }


}
