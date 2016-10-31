<?php
namespace jp3cki\totoridipjp;

use Curl\Curl;

class Totori
{
    public $endPoint = 'http://totori.dip.jp/api/topimg/?format=json';

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
        $curl->get($this->endPoint);
        if ($curl->error) {
            throw new Exception($curl->errorMessage, $curl->errorCode);
        }
        $json = $curl->response;
        if (is_object($json) && isset($json->url)) {
            return $json->url;
        }
        throw new Exception('Invalid response');
    }
}
