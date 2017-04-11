<?php

namespace Mobilozophy\MZCAPILaravel\Services\Coupon;

use Mobilozophy\MZCAPILaravel\Services\Api\Account\AccountAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Coupon\CouponAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class CouponService extends ServiceBase
{

    public function __construct( CouponAPIService $couponAPIService) {
        $this->apiService = $couponAPIService;
    }

}
