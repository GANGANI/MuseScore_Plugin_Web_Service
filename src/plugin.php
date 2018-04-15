<?php
/**
 * Created by PhpStorm.
 * User: gangani
 * Date: 4/15/18
 * Time: 11:33 PM
 */

namespace App;

include "connec.php";


class plugin
{
    public function getPluginDetails($attributeArray,$condition){
        $conn = new connec();
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
        $conn = new connec();
        $conn = $conn->makeConnection();
        $str = '';
        $str2 = '';

        for ($i = 0; $i < count($attributeArray); $i++) {

            $str .= ',' . $attributeArray[$i];


        }
        for ($i = 0; $i < count($conditionArray); $i++) {

            $str2 .= ',\'' . $conditionArray[$i].'\'';


        }

        $str = substr($str, 1);
        $str2 = substr($str2, 1);

        $sql1 = "insert into downloadedPlugins($str) values ($str2)";
        $conn->query($sql1) or die($conn->error);;
        return;
    }
}