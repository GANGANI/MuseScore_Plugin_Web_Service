<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 4/15/18
 * Time: 11:29 PM
 */

namespace App;


class connec
{

    function makeConnection(){
        $sereverName ='127.0.0.1';
        $userName = 'root';
        $passWord = '';
        $dbName = 'pluginmanager';
        $conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}