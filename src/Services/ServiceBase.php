<?php
namespace Mobilozophy\MZCAPILaravel\Services;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

class ServiceBase
{
    /**
     * @return Credentials
     */
    public function getSubAccountCredentials($account = null)
    {
        $account = (null != $account) ? $account : env('MZCAPI_ACCT');

        return new Credentials(
            env('MZCAPI_USER'),
            env('MZCAPI_PASS'),
            [
                'Accept'    => 'application/vnd.mzcapi.v2+json',
                'MZAccount' => $account
            ]
        );
    }
}