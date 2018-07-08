<?php

namespace Mobilozophy\MZCAPILaravel\Services\Spark;

//use Mobilozophy\MZCAPILaravel\Services\Api\Spark\SparkAPIService;
use Mobilozophy\MZCAPILaravel\Services\ServiceBase;

/**
 * Class SparkService
 * @author Angel Gonzalez <agonzalez@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Spark
 */

class SparkService extends ServiceBase
{
    public $sparkAPIService;

    /**
     * ReportingService constructor.
     * @param SparkAPIService $sparkAPIService
     */
    public function __construct() {

    }

    public function usesTeams()
    {
        $results = false;

        return $results;
    }
}