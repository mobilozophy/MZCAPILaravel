<?php

namespace Mobilozophy\MZCAPILaravel\Services\InterestCategory;

use Mobilozophy\MZCAPILaravel\Services\Api\InterestCategory\InterestCategoryAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class InterestCategoryService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\InterestCategory
 */
class InterestCategoryService extends ServiceBase
{
    /**
     * InterestCategoryService constructor.
     * @param InterestCategoryAPIService $interestCategoryAPIService
     */
    public function __construct(
        InterestCategoryAPIService $interestCategoryAPIService
    ) {
        $this->apiService = $interestCategoryAPIService;
    }
}
