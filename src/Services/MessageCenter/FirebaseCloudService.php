<?php

namespace Mobilozophy\MZCAPILaravel\Services\MessageCenter;

use Mobilozophy\MZCAPILaravel\Services\Api\MessageCenter\FirebaseCloudAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class FirebaseCloudService
 * @author Angel Gonzalez <agonzalez@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Reporting
 */

class FirebaseCloudService extends ServiceBase
{
    public $fireBaseApiSvc;

    public function __construct(FirebaseCloudAPIService $firebase)
    {
        $this->fireBaseApiSvc = $firebase;
    }

    public function getFirebaseUsers(
        $account_uuid,
        $scope = false,
        $otherHeaders = []
    ) {
        try {
            $response = $this->fireBaseApiSvc->makeGetCall(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                ),
                'registrations'
            );

            if ($response->getStatusCode() == 200) {
                $json_string = $response->getBody()->getContents();
                return json_decode($json_string, true);
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAllNotifications(
        $account_uuid,
        $scope = false,
        $otherHeaders = []
    ) {
        try {
            $response = $this->fireBaseApiSvc->makeGetCall(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                ),
                'notifications'
            );

            if ($response->getStatusCode() == 200) {
                $json_string = $response->getBody()->getContents();
                return json_decode($json_string, true);
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function createNewNotification(
        $data,
        $account_uuid,
        $scope = false,
        $otherHeaders = []
    ) {
        try {
            $response = $this->fireBaseApiSvc->makePostCall(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                ),
                $data,
                'new'
            );

            if ($response->getStatusCode() == 200) {
                $json_string = $response->getBody()->getContents();
                return json_decode($json_string, true);
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function editOldNotification(
        $data,
        $account_uuid,
        $scope = false,
        $otherHeaders = []
    ) {
        try {
            $response = $this->fireBaseApiSvc->makePostCall(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                ),
                $data,
                'edit'
            );

            if ($response->getStatusCode() == 200) {
                $json_string = $response->getBody()->getContents();
                return json_decode($json_string, true);
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteOldNotification(
        $note_uuid,
        $account_uuid,
        $scope = false,
        $otherHeaders = []
    ) {
        try {
            $response = $this->fireBaseApiSvc->makeDeleteCall(
                $this->getSubAccountCredentials(
                    $account_uuid,
                    $scope,
                    $otherHeaders
                ),
                $note_uuid,
                'delete'
            );

            if ($response->getStatusCode() == 200) {
                $json_string = $response->getBody()->getContents();
                return json_decode($json_string, true);
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
