<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CodeAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class CodeService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MessageCenter
 */
class CodeService extends ServiceBase
{
    /**
     * CodeService constructor.
     * @param CodeAPIService $codeAPIService
     */
    public function __construct(CodeAPIService $codeAPIService)
    {
        $this->apiService = $codeAPIService;
    }
}
