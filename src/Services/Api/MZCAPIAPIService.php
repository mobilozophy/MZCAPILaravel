<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use function GuzzleHttp\Psr7\str;
use InvalidArgumentException;

class MZCAPIAPIService extends AbstractAPIService
{

    /**
     * Send a request to add a new resource.
     *
     * @param Credentials $credentials
     * @param array $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function add(Credentials $credentials, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl();

            return $this->httpClient->post($requestUrl, [
                'headers'     => $credentials->getHeaders(),
                'auth'        => $credentials->toArray(),
                'form_params' => $params
            ]);

    }

    /**
     * Send a request to update a resource
     *
     * @param Credentials $credentials
     * @param             $id
     * @param array       $params
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(Credentials $credentials, $id, array $params)
    {
        $requestUrl = $this->getEndpointRequestUrl($id);
            return $this->httpClient->put($requestUrl, [
                'headers'     => $credentials->getHeaders(),
                'auth'        => $credentials->toArray(),
                'form_params' => $params
            ]);

    }

    /**
     * Send a request to retrieve a resource.
     *
     * @param Credentials $credentials
     * @param string $id
     * @param string $include
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(Credentials $credentials, $id, $include=[])
    {
        $includesImplode  = implode(',',$include);

        $includeAddOn = ((!is_null($includesImplode) && $includesImplode!='')?"?include=$includesImplode":'');
        $requestUrl = $this->getEndpointRequestUrl($id).$includeAddOn;
            return $this->httpClient->get($requestUrl, [
                'headers' => $credentials->getHeaders(),
                'auth'    => $credentials->toArray()
            ]);

    }


    /**
     * Send a request to retrieve all resources.
     *
     * @param Credentials $credentials
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAll(Credentials $credentials)
    {
        $requestUrl = $this->getEndpointRequestUrl();
            return $this->httpClient->get($requestUrl, [
                'headers' => $credentials->getHeaders(),
                'auth'    => $credentials->toArray()
            ]);

    }


    /**
     * Send a request to delete a resource
     * .
     * @param Credentials $credentials
     * @param string $id
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(Credentials $credentials, $id)
    {
        $requestUrl = $this->getEndpointRequestUrl($id);
            return $this->httpClient->delete($requestUrl, [
                'headers' => $credentials->getHeaders(),
                'auth'    => $credentials->toArray()
            ]);
    }


    /**
     * Get base API request URL with additional segments.
     *
     * @param mixed $segments Segments of the URL
     *
     * @return string
     */
    protected function getBaseRequestUrl($segments = null)
    {
        if (is_array($segments)) {
            $segments = implode('/', $segments);
        }

        $baseUrl = env('MZCAPI_BASEURL');

        return $baseUrl . '/' . $segments;
    }



}
