<?php


class UserTest extends \Codeception\Test\Unit
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
    public function testMe()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['email'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('jana@gmail.com',$row['email']);
    }
}