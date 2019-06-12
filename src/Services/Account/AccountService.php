<?php

namespace Mobilozophy\MZCAPILaravel\Services\Account;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class AccountService
 * @package Mobilozophy\MZCAPILaravel\Services\Account
 */
class AccountService extends ServiceBase
{
    /**
     * AccountService constructor.
     *
     * @param AccountAPIService $accountAPIService
     */
    public function __construct(AccountAPIService $accountAPIService)
    {
        $this->apiService = $accountAPIService;
    }
}
