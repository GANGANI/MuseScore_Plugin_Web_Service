<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 5/14/18
 * Time: 9:43 PM
 */

class SignUpTest extends \Codeception\Test\Unit
{
    public function testUsername()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['username'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('jana',$row['username']);
    }

    public function testEmail()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['email'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('jana@gmail.com',$row['email']);
    }

    public function testPassword()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['password'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('Jana@123',$row['password']);
    }

    public function testUserRoleType()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['user_role_type'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('developer',$row['user_role_type']);
    }


    public function testAllSignUpDetails()
    {
        $user = new \App\User();
        $result = $user->getUserDetails(['email','user_role_type','username'],'jana');
        $row = $result->fetch_assoc();
        $this->assertEquals('developer',$row['user_role_type']);
        $this->assertEquals('jana@gmail.com',$row['email']);
        $this->assertEquals('jana',$row['username']);
    }

}
