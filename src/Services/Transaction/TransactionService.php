<?php

namespace Mobilozophy\MZCAPILaravel\Services\Transaction;

use Mobilozophy\MZCAPILaravel\Services\Api\Transaction\TransactionAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class TransactionService
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Transaction
 */
class TransactionService extends ServiceBase
{
    /**
     * TransactionService constructor.
     * @param TransactionAPIService $transactionAPIService
     */
    public function __construct(TransactionAPIService $transactionAPIService)
    {
        $this->apiService = $transactionAPIService;
    }

    /**
     * @param string $id Id (UUID) of the record to be updated.
     * @param array $data Data to be submitted.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @return bool|mixed
     */
    public function loyalty(
        $id,
        array $data,
        $account_uuid = null,
        $scope = false,
        $otherHeaders
    ) {
        $response = $this->apiService->loyalty(
            $this->getSubAccountCredentials(
                $account_uuid,
                $scope,
                $otherHeaders
            ),
            $id,
            $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }

    /**
     * @param string $id Id (UUID) of the record to be updated.
     * @param array $data Data to be submitted.
     * @param null|string $account_uuid The account id of the account to perform this call on.
     * @param bool|string $scope The scope to apply to call (ex. with-children will scope to all child accounts).
     * @param array $otherHeaders Other headers to apply to call.
     * @return bool|mixed
     */
    public function coupon(
        $id,
        array $data,
        $account_uuid = null,
        $scope = false,
        $otherHeaders
    ) {
        $response = $this->apiService->coupon(
            $this->getSubAccountCredentials(
                $account_uuid,
                $scope,
                $otherHeaders
            ),
            $id,
            $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else {
            return false;
        }
    }
}
