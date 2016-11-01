<?php
namespace jp3cki\totoridipjp;

use Curl\Curl;

class Totori
{
    public $endPoint = 'http://totori.dip.jp/api/topimg/?format=json';
    public $userAgent;

    public function __construct()
    {
        $this->userAgent = sprintf(
            '%s/%s (+%s)', 
            'totoridipjp',
            Version::VERSION,
            Version::PROJ_URL
        );
    }

    public function __get($key)
    {
        if ($key === 'イワシ') {
            return $this->getIwashi();
        }
    }

    public function __toString()
    {
        return 'イワシがいっぱいだあ…ちょっとだけもらっていこうかな';
    }

    public function getIwashi()
    {
        $curl = new Curl();
        $curl->setUserAgent($this->userAgent);
        $curl->get($this->endPoint);
        if ($curl->error) {
            throw new Exception($curl->errorMessage, $curl->errorCode);
        }
        $resp = new ApiResponse($curl->rawResponse);
        return $resp->getUrl();
    }
}
