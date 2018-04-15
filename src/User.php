<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 4/15/18
 * Time: 8:20 PM
 */

namespace App;


class User
{
    public function getUserDetails($attributeArray,$condition){
        $conn = new connec();
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
        $conn = new connec();
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
}