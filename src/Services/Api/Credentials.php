<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api;

/**
 * Class Credentials
 * @author Jeffrey Wray <jwray@mobilozophy.com>
 * @package Mobilozophy\MZCAPILaravel\Services\Api
 */
class Credentials
{
    public $username;
    public $password;
    public $headers;

    /**
     * Credentials constructor.
     * @param $username
     * @param $password
     * @param array $headers
     */
    public function __construct($username, $password, $headers = array())
    {
        $this->username = $username;
        $this->password = $password;
        $this->headers  = $headers;
    }

    /**
     * @return array
     */
    public function toArray() {
        return [$this->username, $this->password];
    }

    /**
     * @return array
     */
    public function getHeaders() {
        return $this->headers;
    }
}
