<?php
use jp3cki\totoridipjp\ApiResponse;
use jp3cki\totoridipjp\Exception;
use jp3cki\totoridipjp\TypeError;

class ApiResponseTest extends \Codeception\Test\Unit
{
    use \Codeception\Specify;

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
        $this->expectException('jp3cki\totoridipjp\TypeError');
        $obj = new ApiResponse(null);
    }

    public function testConstruct3()
    {
        $this->expectException('jp3cki\totoridipjp\TypeError');
        $obj = new ApiResponse(42);
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
        $this->expectException('jp3cki\totoridipjp\Exception');
        $obj = new ApiResponse('{"id":"topimg"}');
        $obj->getUrl();
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
        $this->expectException('jp3cki\totoridipjp\Exception');
        $obj = new ApiResponse('{hoge}');
        $obj->getUrl();
    }

    public function testWithBrokenJson2()
    {
        $this->expectException('jp3cki\totoridipjp\Exception');
        $obj = new ApiResponse('[]');
        $obj->getUrl();
    }
}
