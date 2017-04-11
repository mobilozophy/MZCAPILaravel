<?php

namespace Mobilozophy\MZCAPILaravel\Services\Account;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class AccountService extends ServiceBase
{

    public function __construct(AccountAPIService $accountAPIService) {
        $this->apiService = $accountAPIService;
    }

}
