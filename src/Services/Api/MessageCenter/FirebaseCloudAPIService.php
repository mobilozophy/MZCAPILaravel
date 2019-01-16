<?php


namespace Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class FirebaseCloudAPIService extends MZCAPIAPIService
{
    const ENDPOINT = '/messages/firebase';

    /**
     * Send a request to create a new firebase notification record.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getTransactionReport(Credentials $credentials, array $data)
    {

        $requestUrl = $this->getEndpointRequestUrl('new');
        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'form_params' => $data
        ]);
    }
}