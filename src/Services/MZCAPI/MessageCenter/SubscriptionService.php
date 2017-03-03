<?php

namespace Mobilozophy\MZCAPILaravel\Services\MZCAPI\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPI\MessageCenter\SubscriptionAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class SubscriptionService
{
    use UsesCredentialsTrait;

    private $subscriptionApiService;


    /**
     * @param App\Services\Api\SubscriptionAPIService $keywordApiService
     */
    public function __construct(
        SubscriptionAPIService $subscriptionAPIService
    ) {
        $this->subscriptionApiService = $subscriptionAPIService;
    }

    /**
     * Add a keyword.
     *
     * @param array $data
     */
    public function add(array $data)
    {

        $response = $this->subscriptionApiService->add(
            $this->getSubAccountCredentials(), $data
        );
    }



    /**
     * Get keyword.
     *
     * @param integer $keywordId
     */
    public function get($id)
    {
        $response = $this->subscriptionApiService->get(
            $this->getSubAccountCredentials(), $id
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }

    /**
     * Get keywords.
     */
    public function getall()
    {
        $response = $this->subscriptionApiService->getAll(
            $this->getSubAccountCredentials()
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }

    public function delete($id)
    {
        $response = $this->subscriptionApiService->delete(
            $this->getSubAccountCredentials(), $id
        );
        if ($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        } else
        {
            return false;
        }
    }


    public function getSubAccountCredentials()
    {
        return new Credentials(
            env('MZCAPI_USER'),
            env('MZCAPI_PASS'),
            [
                'Accept'=>'application/vnd.mzcapi.v2+json',
                'MZAccount'=>env('MZCAPI_ACCT')
            ]
        );
    }
}
