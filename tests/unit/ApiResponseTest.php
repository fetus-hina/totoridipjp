<?php
use jp3cki\totoridipjp\ApiResponse;
use jp3cki\totoridipjp\Exception;
use jp3cki\totoridipjp\TypeError;

class ApiResponseTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testConstruct1()
    {
        $obj = new ApiResponse('{"id":"topimg","url":"http://example.com/foo.jpg"}');
    }

    public function testConstruct2()
    {
        try {
            $obj = new ApiResponse(null);
            $this->fail();
        } catch (TypeError $e) {
        }
    }

    public function testConstruct3()
    {
        try {
            $obj = new ApiResponse(42);
            $this->fail();
        } catch (TypeError $e) {
        }
    }

    public function testGetUrl1()
    {
        $obj = new ApiResponse('{"id":"topimg","url":"http://example.com/foo.jpg"}');
        $this->assertEquals('http://example.com/foo.jpg', $obj->getUrl());

        $obj = new ApiResponse('{"id":"topimg","url":"https://example.com/bar.jpg"}');
        $this->assertEquals('https://example.com/bar.jpg', $obj->getUrl());
    }

    public function testGetUrl2()
    {
        $obj = new ApiResponse('{"id":"topimg"}');
        try {
            $obj->getUrl();
            $this->fail();
        } catch (Exception $e) {
        }
    }

    public function testGetJson()
    {
        $obj = new ApiResponse('{"id":"topimg","url":"http://example.com/foo.jpg"}');
        $this->assertEquals('{"id":"topimg","url":"http://example.com/foo.jpg"}', $obj->getJson());

        $obj = new ApiResponse('{"id":"topimg","url":"https://example.com/bar.jpg"}');
        $this->assertEquals('{"id":"topimg","url":"https://example.com/bar.jpg"}', $obj->getJson());
    }

    public function testWithBrokenJson1()
    {
        $obj = new ApiResponse('{hoge}');
        try {
            $obj->getUrl();
            $this->fail();
        } catch (Exception $e) {
        }
    }

    public function testWithBrokenJson2()
    {
        $obj = new ApiResponse('[]');
        try {
            $obj->getUrl();
            $this->fail();
        } catch (Exception $e) {
        }
    }
}
