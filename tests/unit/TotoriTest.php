<?php
use jp3cki\totoridipjp\Totori;

class TotoriTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $totori;

    protected function _before()
    {
        $this->totori = new Totori();
        $this->totori->endPoint = 'http://localhost:9821/api.php';
    }

    protected function _after()
    {
    }

    // tests
    public function testStringify()
    {
        $this->assertEquals(
            'イワシがいっぱいだあ…ちょっとだけもらっていこうかな',
            (string)$this->totori
        );
    }

    public function testGetIwashi()
    {
        $this->assertRegExp('/^https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+$/', $this->totori->getIwashi());
    }

    public function testPropertyIwashi()
    {
        $iwashi = 'イワシ';
        $this->assertRegExp('/^https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+$/', $this->totori->$iwashi);
    }

    public function testUnknownProperty()
    {
        $this->assertNull($this->totori->hoge);
    }
}
