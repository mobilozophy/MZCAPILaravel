<?php


namespace Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\Api\MZCAPIAPIService;

class FirebaseCloudAPIService extends MZCAPIAPIService
{
    const ENDPOINT = 'messages/firebase';

    /**
     * Send a post request to create to an MZ-Firebase related resource.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return mixed
     */
    public function makePostCall(Credentials $credentials, array $data = [], $segment = '')
    {

        $requestUrl = $this->getEndpointRequestUrl($segment);

        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'form_params' => $data
        ]);
    }

    /**
     * Send a post request to create to an MZ-Firebase related resource.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return mixed
     */
    public function makeGetCall(Credentials $credentials, $segment = '')
    {

        $requestUrl = $this->getEndpointRequestUrl($segment);

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    /**
     * Send a delete request to create to an MZ-Firebase related resource.
     *
     * @param Credentials $credentials
     * @param integer $accountId
     * @return mixed
     */
    public function makeDeleteCall(Credentials $credentials, $note_id, $segment = '')
    {

        $requestUrl = $this->getEndpointRequestUrl($segment);

        return $this->httpClient->delete($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'form_params' => ['notification_id' => $note_id]
        ]);
    }


}