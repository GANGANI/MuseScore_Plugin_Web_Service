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
    public function testEmail()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['email'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('jana@gmail.com',$row['email']);


    }

    public function testUserRoleType()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['user_role_type'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('developer',$row['user_role_type']);
    }

    public function testUserDetails()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['email','user_role_type'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('developer',$row['user_role_type']);
        $this->assertEquals('jana@gmail.com',$row['email']);
    }
}