<?php

namespace Mobilozophy\MZCAPILaravel\Services\Loyalty;

use Mobilozophy\MZCAPILaravel\Services\Api\Loyalty\LoyaltyAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class LoyaltyService
 * Purpose: Explain what this class does.
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * Last Modified: ${DATE}
 * @package Mobilozophy\MZCAPILaravel\Services\Loyalty
 */
class LoyaltyService extends ServiceBase
{

    /**
     * LoyaltyService constructor.
     *
     * @param LoyaltyAPIService $loyaltyAPIService
     */
    public function __construct(LoyaltyAPIService $loyaltyAPIService) {
        $this->apiService = $loyaltyAPIService;
    }

}
