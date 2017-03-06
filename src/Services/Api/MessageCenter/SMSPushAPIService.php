<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter;


use Mobilozophy\MZCAPILaravel\Services\Api\AbstractAPIService;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;
use Mobilozophy\MZCAPILaravel\Services\ServiceActionException;
//use Log;

class SMSPushAPIService extends AbstractAPIService
{
    const ENDPOINT = 'message-center/sms/push';

    /**
     * Send a request to add a new list.
     *
     * @param Credentials $credentials
     * @param array       $list
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function add(Credentials $credentials, array $list)
    {
        $requestUrl = $this->getEndpointRequestUrl();


        return $this->httpClient->post($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'form_params' => $list
        ]);
    }

    /**
     * @param Credentials $credentials
     * @param             $id
     * @param array       $data
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(Credentials $credentials, $id, array $data)
    {
        $requestUrl = $this->getEndpointRequestUrl($id);

        return $this->httpClient->put($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'query' => $data
        ]);
    }

    public function activate(Credentials $credentials, $id, array $data)
    {
        $requestUrl = $this->getEndpointRequestUrl($id).'/activate';

        return $this->httpClient->put($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray(),
            'query' => $data
        ]);
    }

    /**
     * Send a request to retrieve a list.
     *
     * @param Credentials $credentials
     * @param integer $listId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function get(Credentials $credentials, $listId)
    {
        $requestUrl = $this->getEndpointRequestUrl($listId);

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    /**
     * Send a request to retrieve all list.
     *
     * @param Credentials $credentials
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAll(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl();

        return $this->httpClient->get($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }


    /**
     * Send a request to delete a store.
     *
     * @param Credentials $credentials
     * @param integer $listId
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function delete(Credentials $credentials, $listId)
    {
        $requestUrl = $this->getEndpointRequestUrl($listId);

        return $this->httpClient->delete($requestUrl, [
            'headers' => $credentials->getHeaders(),
            'auth' => $credentials->toArray()
        ]);
    }

    /**
     * Get base API request URL with additional segments.
     *
     * @param mixed $segments
     */
    protected function getBaseRequestUrl($segments = null)
    {
        if (is_array($segments)) {
            $segments = implode('/', $segments);
        }

        $baseUrl = config('services.mz_v2_api.url');

        return $baseUrl . '/' . $segments;
    }
}
