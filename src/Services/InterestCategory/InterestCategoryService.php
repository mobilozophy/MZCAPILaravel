<?php

namespace Mobilozophy\MZCAPILaravel\Services\InterestCategory;

use Mobilozophy\MZCAPILaravel\Services\Api\InterestCategory\InterestCategoryAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class InterestCategoryService extends ServiceBase
{

    public function __construct( InterestCategoryAPIService $interestCategoryAPIService) {
        $this->apiService = $interestCategoryAPIService;
    }

}
