<?php
/**
 * Created by PhpStorm.
 * User: angelgonzalez
 * Date: 4/30/18
 * Time: 1:18 AM
 */

namespace Mobilozophy\MZCAPILaravel\Services\CouponTemplate;

use Mobilozophy\MZCAPILaravel\Services\Api\CouponTemplate\CouponTemplateAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Coupon\CouponAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

class CouponTemplateService extends ServiceBase
{
    /**
     * CouponService constructor.
     * @param CouponAPIService $couponAPIService
     */
    public function __construct( CouponTemplateAPIService $templateAPIService) {
        $this->apiService = $templateAPIService;
    }

    public function createNewTemplate($data, $account_uuid, $scope = false, $otherHeaders=[])
    {
        try {
            $response = $this->apiService->createNewTemplate(
                $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders),
                $data, $account_uuid);


            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        }catch (\Exception $e)
        {
            return false;
        }
    }

    public function updateTemplate($template_uuid, $data, $account_uuid, $scope = false, $otherHeaders=[])
    {
        try {
            $response = $this->apiService->updateTemplate(
                $this->getSubAccountCredentials($account_uuid,$scope, $otherHeaders),
                $template_uuid, $data, $account_uuid);


            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        }catch (\Exception $e)
        {
            return false;
        }
    }

    public function getMarkup($template_id, $account_id = null, $scope = false, $otherHeaders=[], $storeId = null)
    {
        try {
            $response = $this->apiService->getCouponTemplateMarkup(
                $this->getSubAccountCredentials($account_id,$scope, $otherHeaders),
                $template_id, $account_id);


            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        }catch (\Exception $e)
        {
            return false;
        }
    }

    public function getPreview($coupon_id, $template_id, $account_id = null, $scope = false, $otherHeaders=[], $storeId = null)
    {
        try {
            $response = $this->apiService->getCouponPreview(
                $this->getSubAccountCredentials($account_id,$scope, $otherHeaders),
                $coupon_id, $template_id, $account_id);


            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        }catch (\Exception $e)
        {
            return false;
        }
    }

    public function assignTemplateToCoupon($coupon_id, $template_id, $account_id = null, $scope = false, $otherHeaders=[], $storeId = null)
    {
        try
        {
            $response = $this->apiService->assignTemplateToCoupon(
                $this->getSubAccountCredentials($account_id,$scope, $otherHeaders),
                $coupon_id, $template_id, $account_id
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        }
        catch (\Exception $e)
        {
            return false;
        }

    }

    public function unassignTemplateFromCoupon($coupon_id, $template_id, $account_id = null, $scope = false, $otherHeaders=[], $storeId = null)
    {
        try
        {
            $response = $this->apiService->unassignTemplateFromCoupon(
                $this->getSubAccountCredentials($account_id,$scope, $otherHeaders),
                $coupon_id, $template_id, $account_id
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

    public function deleteTemplate($template_id, $account_id = null, $scope = false, $otherHeaders=[], $storeId = null)
    {
        try
        {
            $response = $this->apiService->deleteTemplate(
                $this->getSubAccountCredentials($account_id,$scope, $otherHeaders),
                $template_id, $account_id
            );

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        }
        catch (\Exception $e)
        {
            return false;
        }
    }
}