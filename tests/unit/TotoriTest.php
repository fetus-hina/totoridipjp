<?php
use jp3cki\totoridipjp\Totori;

class TotoriTest extends \Codeception\Test\Unit
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
    public function testStringify()
    {
        $this->assertEquals(
            'イワシがいっぱいだあ…ちょっとだけもらっていこうかな',
            (string)(new Totori())
        );
    }

    public function testGetIwashi()
    {
        $obj = new Totori();
        $this->assertRegExp('/^https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+$/', $obj->getIwashi());
    }

    public function testPropertyIwashi()
    {
        $iwashi = 'イワシ';
        $obj = new Totori();
        $this->assertRegExp('/^https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+$/', $obj->$iwashi);
    }

    public function testUnknownProperty()
    {
        $obj = new Totori();
        $this->assertNull($obj->hoge);
    }
}
