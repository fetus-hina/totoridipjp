<?php
namespace jp3cki\totoridipjp;

use Curl\Curl;

class ApiResponse
{
    private $json;

    public function __construct($json)
    {
        if (!is_string($json)) {
            throw new TypeError('$json must be string');
        }
        $this->json = $json;
    }

    public function getJson()
    {
        return $this->json;
    }

    public function getUrl()
    {
        $obj = $this->getDecoded();
        if (!isset($obj->url)) {
            throw new Exception('Broken json given');
        }
        return $obj->url;
    }

    protected function getDecoded()
    {
        $decoded = \json_decode($this->json);
        if ($decoded === null && \json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception(\json_last_error_msg(), \json_last_error());
        }
        if (!is_object($decoded)) {
            throw new Exception('Broken json given');
        }
        return $decoded;
    }
}
