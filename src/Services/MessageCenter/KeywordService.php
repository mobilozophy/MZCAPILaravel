<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;


use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\KeywordAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class KeywordService extends ServiceBase
{

    public function __construct(
        KeywordAPIService $keywordApiService
    ) {
        $this->apiService = $keywordApiService;
    }


}
