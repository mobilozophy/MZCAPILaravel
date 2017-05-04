<?php
namespace Mobilozophy\MZCAPILaravel\Services;
use Mobilozophy\MZCAPILaravel\Services\Api\Credentials;

class ServiceBase
{
    use UsesCredentialsTrait;

    protected $apiService;


    /**
     * Add - POST
     * @param array $data
     * @param null  $account_uuid
     *
     * @return bool|mixed
     */
    public function add(array $data, $account_uuid = null, $scope = false)
    {

        $response = $this->apiService->add(
            $this->getSubAccountCredentials($account_uuid,$scope), $data
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


    /**
     * Update - PUT
     * @param       $id
     * @param array $data
     * @param null  $account_uuid
     *
     * @return bool|mixed
     */
    public function update($id, array $data, $account_uuid = null, $scope = false)
    {

        $response = $this->apiService->update(
            $this->getSubAccountCredentials($account_uuid,$scope), $id, $data, $account_uuid
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


    /**
     * Get - GET by ID
     * @param      $id
     * @param null $account_uuid
     *
     * @return bool
     */
    public function get($id,$account_uuid = null, $scope = false)
    {
        try {
            $response = $this->apiService->get(
                $this->getSubAccountCredentials($account_uuid,$scope), $id
            );
            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->getContents());
            } else {
                return false;
            }
        } catch (\Exception $e)
        {
            return false;
        }
    }


    /**
     * Get All - GET All
     * @param null $account_uuid
     *
     * @return bool
     */
    public function getall($account_uuid = null, $scope = false)
    {
        $response = $this->apiService->getAll(
            $this->getSubAccountCredentials($account_uuid,$scope)
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


    /**
     * Delete - DELETE
     * @param      $id
     * @param null $account_uuid
     *
     * @return bool
     */
    public function delete($id, $account_uuid = null, $scope = false)
    {
        $response = $this->apiService->delete(
            $this->getSubAccountCredentials($account_uuid,$scope), $id
        );
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody()->getContents());
        } else
        {
            return false;
        }
    }


    /**
     *
     * @param null $account
     *
     * @return Credentials
     */
    public function getSubAccountCredentials($account = null, $scope = false, $otherHeaders = array())
    {
        $account = (null != $account) ? $account : env('MZCAPI_ACCT');

        $headers =             [
            'Accept'    => 'application/vnd.mzcapi.v2+json',
            'MZAccount' => $account
        ];

        if($scope)
        {
            $headers['MZScope'] = $scope;
        }

        $headers = array_merge($headers, $otherHeaders);

        return new Credentials(
            env('MZCAPI_USER'),
            env('MZCAPI_PASS'),
            $headers

        );
    }

    protected function handleErrorException($exception)
    {
        $responseBody = $exception->getResponse()->getBody()->getContents();
        $exceptionCode = $exception->getCode();
        $responseJsonDecode = json_decode($responseBody,true);
        unset($responseJsonDecode['error']['debug']);
        return json_encode($responseJsonDecode);

    }
}