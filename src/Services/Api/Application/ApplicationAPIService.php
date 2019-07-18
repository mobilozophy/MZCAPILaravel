<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Application;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class ApplicationAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'apps';

    public function setFeaturedCoupon(Credentials $credentials, $appId, $couponId)
    {
        $requestUrl = $this->getEndpointRequestUrl([$appId, 'featured', 'coupons', $couponId]);
        return $this->httpClient->post($requestUrl, $this->generateOptions($credentials));
    }

    public function setFeaturedLoyalty(Credentials $credentials, $appId, $loyaltyId)
    {
        $requestUrl = $this->getEndpointRequestUrl([$appId, 'featured', 'loyalty', $loyaltyId]);
        return $this->httpClient->post($requestUrl, $this->generateOptions($credentials));
    }
}
