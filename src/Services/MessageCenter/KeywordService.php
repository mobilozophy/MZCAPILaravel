<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;


use Mobilozophy\MZCAPILaravel\Services\AbilityService;
use Mobilozophy\MZCAPILaravel\Services\ActiveMerchantService;
use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\KeywordAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class KeywordService
{
    use UsesCredentialsTrait;

    private $keywordApiService;


    /**
     * @param Mobilozophy\MZCAPILaravel\Services\Api\KeywordAPIService $keywordApiService
     */
    public function __construct(
        KeywordAPIService $keywordApiService
    ) {
        $this->keywordApiService = $keywordApiService;
    }

    /**
     * Add a keyword.
     *
     * @param array $data
     */
    public function addKeyword(array $data)
    {

        return $this->keywordApiService->add(
            $this->getSubAccountCredentials(), $data
        )->json();
    }



    /**
     * Get keyword.
     *
     * @param integer $keywordId
     */
    public function getKeyword($keywordId)
    {
        return $this->keywordApiService->get(
            $this->getSubAccountCredentials(), $keywordId
        )->json();
    }

    /**
     * Get keywords.
     */
    public function getKeywords()
    {
        return $this->keywordApiService->getAll(
            $this->getSubAccountCredentials()
        )->json();
    }

    public function delete($id)
    {
        return $this->keywordApiService->delete(
            $this->getSubAccountCredentials(), $id
        )->json();
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
