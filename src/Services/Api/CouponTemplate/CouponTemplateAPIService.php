<?php

namespace Mobilozophy\MZCAPILaravel\Services\CouponTemplate;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class CouponTemplateAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'coupons';

    public function createNewTemplate(Credentials $credentials, $data, $account_uuid)
    {
        $requestUrl = $this->getEndpointRequestUrl($account_uuid)."/template/create";

        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray(),
            'form_params'  => $data
        ]);
    }

    public function updateTemplate(Credentials $credentials, $template_uuid, $data, $account_uuid)
    {
        $requestUrl = $this->getEndpointRequestUrl($account_uuid)."/template/{$template_uuid}/update";

        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray(),
            'form_params'  => $data
        ]);
    }

    public function getCouponTemplateMarkup(Credentials $credentials, $template_id, $account_id)
    {
        $requestUrl = $this->getEndpointRequestUrl($account_id)."/template/{$template_id}/markup";

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray(),
        ]);
    }

    public function getCouponPreview(Credentials $credentials, $coupon_id, $template_id, $account_id)
    {
        $requestUrl = $this->getEndpointRequestUrl($account_id)."/{$coupon_id}/template/{$template_id}/preview";

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray()
        ]);
    }

    public function unassignTemplateFromCoupon(Credentials $credentials, $coupon_id, $template_id, $account_id)
    {
        $requestUrl = $this->getEndpointRequestUrl($account_id)."/{$coupon_id}/template/{$template_id}/unassign";

        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray()
        ]);
    }

    public function assignTemplateToCoupon(Credentials $credentials, $coupon_id, $template_id, $account_id)
    {
        $requestUrl = $this->getEndpointRequestUrl($account_id)."/{$coupon_id}/template/{$template_id}/assign";

        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray()
        ]);
    }

    public function deleteTemplate(Credentials $credentials, $template_id, $account_id)
    {
        $requestUrl = $this->getEndpointRequestUrl($account_id)."/template/{$template_id}/delete";

        return $this->httpClient->delete($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth'    => $credentials->toArray()
        ]);
    }
}