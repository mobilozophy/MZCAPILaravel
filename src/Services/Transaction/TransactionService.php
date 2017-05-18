<?php

namespace Mobilozophy\MZCAPILaravel\Services\Transaction;

use Mobilozophy\MZCAPILaravel\Services\Api\Transaction\TransactionAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class LoyaltyService
 * Purpose: Explain what this class does.
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * Last Modified: ${DATE}
 * @package Mobilozophy\MZCAPILaravel\Services\Loyalty
 */
class TransactionService extends ServiceBase
{


    public function __construct(TransactionAPIService $transactionAPIService) {
        $this->apiService = $transactionAPIService;
    }

    public function loyalty($id, array $data, $account_uuid = null, $scope = false, $otherHeaders)
    {

        $response = $this->apiService->loyalty(
            $this->getSubAccountCredentials($account_uuid,$scope,$otherHeaders), $id, $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


    public function coupon($id, array $data, $account_uuid = null, $scope = false, $otherHeaders)
    {

        $response = $this->apiService->coupon(
            $this->getSubAccountCredentials($account_uuid,$scope,$otherHeaders), $id, $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


}
