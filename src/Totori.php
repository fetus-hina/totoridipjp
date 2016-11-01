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
        return null;
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
            // @codeCoverageIgnoreStart
            throw new Exception($curl->errorMessage, $curl->errorCode);
            // @codeCoverageIgnoreEnd
        }
        $resp = new ApiResponse($curl->rawResponse);
        return $resp->getUrl();
    }
}
