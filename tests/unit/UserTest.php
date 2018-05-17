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
    public function testUsername()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['username'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('jana',$row['username']);
    }

    public function testUsernameValidity()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['username'],'jana');
        $row = $result->fetch_assoc();
        $this->assertNotEquals('janani','jana');
    }

    public function testEmail()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['email'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('jana@gmail.com',$row['email']);
    }

    public function testEmailValidity()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['email'],'jana');
        $row = $result->fetch_assoc();
        $this->assertNotEquals('jana.gmail@com', 'jana@gmail.com');
    }

    public function testPassword()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['password'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('Jana@123',$row['password']);
    }

    public function testPasswordValidity()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['password'],'jana');
        $row = $result->fetch_assoc();
        $this->assertNotEquals('jana@123', $row['password']);
        $this->assertNotEquals('@123', $row['password']);
        $this->assertNotEquals('123', $row['password']);
        $this->assertNotEquals('jana', $row['password']);

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


    public function testAllUserDetails()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['email','user_role_type','username'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('developer',$row['user_role_type']);
        $this->assertEquals('jana@gmail.com',$row['email']);
        $this->assertEquals('jana',$row['username']);
    }
}
