<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\KeywordAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class KeywordService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\MessageCenter
 */
class KeywordService extends ServiceBase
{

    /**
     * KeywordService constructor.
     * @param KeywordAPIService $keywordApiService
     */
    public function __construct(
        KeywordAPIService $keywordApiService
    ) {
        $this->apiService = $keywordApiService;
    }


}
