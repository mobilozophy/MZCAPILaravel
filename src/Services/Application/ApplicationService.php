<?php

namespace Mobilozophy\MZCAPILaravel\Services\Application;

use Mobilozophy\MZCAPILaravel\Services\Api\Application\ApplicationAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class AccountService
 * @package Mobilozophy\MZCAPILaravel\Services\Account
 */
class ApplicationService extends ServiceBase
{

    public function __construct(ApplicationAPIService $applicationAPIService)
    {
        $this->apiService = $applicationAPIService;
    }

    public function createApplication($accountUuid, $name, $scope = false, $otherHeaders = [])
    {
        try {
            $response = $this->apiService->createApplication(
                $this->getSubAccountCredentials($accountUuid, $scope, $otherHeaders),
                $name
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            }

            return $response->getBody()->getContents();

        } catch(\Exception $e) {
            return false;
        }
    }

    public function setFeaturedCoupon($accountUuid, $appId, $couponId, $scope = false, $otherHeaders = [])
    {
        try {
            $response = $this->apiService->setFeaturedCoupon(
                $this->getSubAccountCredentials($accountUuid, $scope, $otherHeaders),
                $appId, $couponId
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            }

            return $response->getBody()->getContents();

        } catch (\Exception $e) {
            return false;
        }
    }

    public function setFeaturedLoyalty($accountUuid, $appId, $loyaltyId, $scope = false, $otherHeaders = [])
    {
        try {
            $response = $this->apiService->setFeaturedLoyalty(
                $this->getSubAccountCredentials($accountUuid, $scope, $otherHeaders),
                $appId, $loyaltyId
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function setCoverImage($accountUuid, $appId, $file, $scope = false, $otherHeaders = [])
    {
        try {
            $response = $this->apiService->setCoverImage(
                $this->getSubAccountCredentials($accountUuid, $scope, $otherHeaders),
                $appId, $file
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            }

            return $response->getBody()->getContents();

        } catch (\Exception $e) {
            return false;
        }
    }
}
