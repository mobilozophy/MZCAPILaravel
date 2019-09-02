<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\Application;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class ApplicationAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'apps';

    public function createApplication(Credentials $credentials, $applicationName)
    {
        $requestUrl = $this->getEndpointRequestUrl();
        return $this->httpClient->post($requestUrl, $this->generateOptions($credentials));
    }

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

    public function setCoverImage(Credentials $credentials, $appId, $file)
    {
        $requestUrl = $this->getEndpointRequestUrl([$appId, 'hero-image']);

        $image_path = $file->getPathname();
        $image_mime = $file->getmimeType();
        $image_org = $file->getClientOriginalName();

        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'multipart' => [
                [
                    'name' => 'file',
                    'filename' => $image_org,
                    'Mime-Type' => $image_mime,
                    'contents' => fopen($image_path, 'r')
                ]
            ]
        ]);
    }
}
