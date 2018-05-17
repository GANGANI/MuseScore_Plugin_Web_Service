<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 4/15/18
 * Time: 11:33 PM
 */

namespace App;

require_once "connection.php";

class plugin
{
    //get plugin details from database  by the plugin title

    public function getPluginDetails($attributeArray,$condition){
        $conn = new connection();
        $conn = $conn->makeConnection();
        $str = '';
        for ($i = 0; $i < count($attributeArray); $i++) {

            $str .= ',' . $attributeArray[$i];

        }
        $str = substr($str, 1);
        $sql1 = "select $str from plugin_details where Title='$condition'";
        $result = $conn->query($sql1);
        return $result;
    }

    public function setPluginDetails($attributeArray,$conditionArray){

        //store plugin details in the database

        $conn = new connection();
        $conn = $conn->makeConnection();
        $str = '';
        $str2 = '';

        for ($i = 0; $i < count($attributeArray); $i++) {

            $str .= ',' . $attributeArray[$i];


        }
        for ($i = 0; $i < count($conditionArray); $i++) {

            $str2 .= ',\'' . $conditionArray[$i].'\'';


        }

        //

        $str = substr($str, 1);
        $str2 = substr($str2, 1);

        $sql1 = "insert into downloadedPlugins($str) values ($str2)";
        $conn->query($sql1) or die($conn->error);
        return;
    }



    public function getDownloadedPluginDetails($attributeArray,$condition){

        //get downloaded plugin details according to the user

        $conn = new connection();
        $conn = $conn->makeConnection();
        $str = '';
        for ($i = 0; $i < count($attributeArray); $i++) {

            $str .= ',' . $attributeArray[$i];

        }
        $str = substr($str, 1);
        $sql1 = "select $str from plugin_details natural join downloadedPlugins where username='$condition'";
        $result = $conn->query($sql1);
        return $result;
    }

}