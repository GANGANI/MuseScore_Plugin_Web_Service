<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 4/15/18
 * Time: 8:20 PM
 */

namespace App;

require_once 'connection.php';
class User
{
    public $username;
    public $password;
    public $userRole;

    public function getUsername($username,$password){

        //get username by password

        $conn = new connection();
        $conn = $conn->makeConnection();
        $sql1 = "SELECT username FROM m_user  WHERE username = '$username' and password = '$password'";
        $result = $conn->query($sql1);
        return $result;
    }

    public function getPassword($username,$password){

        //get password by username

        $conn = new connection();
        $conn = $conn->makeConnection();
        $sql1 = "SELECT username FROM m_user  WHERE username = '$username' and password = '$password'";
        $result = $conn->query($sql1);
        return $result;
    }

    public function getUserRole($username,$password){

        //get user role type by username and password

        $conn = new connection();
        $conn = $conn->makeConnection();
        $sql1 = "SELECT user_role_type FROM m_user  WHERE username = '$username' and password = '$password'";
        $result = $conn->query($sql1);
        return $result;
    }

    public function getUserDetails($attributeArray,$condition){

        //get user details by username

        $conn = new connection();
        $conn = $conn->makeConnection();
        $str = '';
        for ($i = 0; $i < count($attributeArray); $i++) {

            $str .= ',' . $attributeArray[$i];

        }
        $str = substr($str, 1);
        $sql1 = "select $str from m_user where username='$condition'";
        $result = $conn->query($sql1);
        return $result;
    }

    public function setUserDetails($attributeArray,$conditionArray)
    {

        //get user details by giving any of user attributes

        $conn = new connection();
        $conn = $conn->makeConnection();
        $str = '';
        $str2 = '';

        for ($i = 0; $i < count($attributeArray); $i++) {

            $str .= ',' . $attributeArray[$i];


        }
        for ($i = 0; $i < count($conditionArray); $i++) {

            $str2 .= ',\'' . $conditionArray[$i] . '\'';


        }

        $str = substr($str, 1);
        $str2 = substr($str2, 1);

        $sql1 = "insert into m_user($str) values ($str2)";
        $conn->query($sql1) or die($conn->error);;
        return;
    }

    public function validateUsername($username){

        //get all user details by giving username for validation

        $conn = new connection();
        $conn = $conn->makeConnection();
        $sql1 = "SELECT * FROM m_user WHERE username='$username'";
        $result = $conn->query($sql1);
        return $result;
    }

    public function validateEmail($email){

        //get all user details by giving email for validation

        $conn = new connection();
        $conn = $conn->makeConnection();
        $sql1 = "SELECT * FROM m_user WHERE email='$email'";
        $result = $conn->query($sql1);
        return $result;
    }

    public function validatePassword($password){

        //get all user details by giving password for validation

        $conn = new connection();
        $conn = $conn->makeConnection();
        $sql1 = "SELECT * FROM m_user WHERE password='$password'";
        $result = $conn->query($sql1);
        return $result;
    }
}