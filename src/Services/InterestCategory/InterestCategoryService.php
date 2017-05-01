<?php

namespace Mobilozophy\MZCAPILaravel\Services\InterestCategory;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Coupon\CouponAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class InterestCategoryService extends ServiceBase
{

    public function __construct( Inter $couponAPIService) {
        $this->apiService = $couponAPIService;
    }

}
