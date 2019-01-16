<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\FirebaseCloudAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class FirebaseCloudService
 * @author Angel Gonzalez <agonzalez@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Reporting
 */

class FirebaseCloudService extends ServiceBase
{
    public $fireBaseApiSvc;

    public function __construct(FirebaseCloudAPIService $firebase)
    {
        $this->fireBaseApiSvc = $firebase;
    }
}