<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;


use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CodeAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class CodeService extends ServiceBase
{

    public function __construct(
        CodeAPIService $codeAPIService
    ) {
        $this->apiService = $codeAPIService;
    }


}
