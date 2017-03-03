<?php

namespace Mobilozophy\MZCAPILaravel\Services\Api;

class Credentials
{
    public $username;
    public $password;
    public $headers;

    public function __construct($username, $password, $headers = array())
    {
        $this->username = $username;
        $this->password = $password;
        $this->headers  = $headers;
    }
    
    public function toArray() {
        return [$this->username, $this->password];
    }

    public function getHeaders() {
        return $this->headers;
    }
}
