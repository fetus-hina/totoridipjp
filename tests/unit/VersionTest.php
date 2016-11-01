<?php
use jp3cki\totoridipjp\Version;

class VersionTest extends \Codeception\Test\Unit
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
    public function testVersionString()
    {
        $this->assertRegExp('/^[\d.]+$/', Version::VERSION);
    }

    public function testProjectUrl()
    {
        $this->assertRegExp('/^https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+$/', Version::PROJ_URL);
    }
}
