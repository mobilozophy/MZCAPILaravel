<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;


use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CodeAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;
use Mobilozophy\MZCAPILaravel\Services\UsesCredentialsTrait;

class CodeService extends ServiceBase
{
    use UsesCredentialsTrait;

    private $codeAPIService;


    /**
     * @param Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\CodeAPIService $codeAPIService
     */
    public function __construct(
        CodeAPIService $codeAPIService
    ) {
        $this->codeAPIService = $codeAPIService;
    }

    /**
     * Add a keyword.
     *
     * @param array $data
     */
    public function addCode(array $data)
    {

        $code = $this->codeAPIService->insert(
            $this->getSubAccountCredentials(), $data
        )->json();
    }



    /**
     * Get keyword.
     *
     * @param integer $keywordId
     */
    public function getCode($codeId)
    {
        return $this->codeAPIService->get(
            $this->getSubAccountCredentials(), $codeId
        )->json();
    }

    /**
     * Get keywords.
     */
    public function getCodes()
    {
        return $this->codeAPIService->getAll(
            $this->getSubAccountCredentials()
        )->json();
    }

}
