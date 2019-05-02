<?php

namespace Mobilozophy\MZCAPILaravel\Services\User;

use Mobilozophy\MZCAPILaravel\Services\Api\User\UserAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class UserService
 * @package Mobilozophy\MZCAPILaravel\Services\User
 */
class UserService extends ServiceBase
{

    /**
     * UserService constructor.
     * @param UserAPIService $service
     */
    public function __construct(UserAPIService $service) {
        $this->apiService = $service;
    }

}
