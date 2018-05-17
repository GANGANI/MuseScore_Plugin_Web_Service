<?php

include "connection.php";


class query
{


    function simple_select($array, $table)
    {
        //select values from database

        $conn = new \App\connection();
        $conn = $conn->makeConnection();
        $str = '';
        for ($i = 0; $i < count($array); $i++) {

            $str .= ',' . $array[$i];

        }
        $str = substr($str, 1);
        $sql = "SELECT $str FROM  $table";
        $result = $conn->query($sql);
        return $result;
    }
    function condition_select($array, $table,$where)
    {
        //select values from database by condition

        $conn = new \App\connection();
        $conn = $conn->makeConnection();
        $str = '';
        for ($i = 0; $i < count($array); $i++) {

            $str .= ',' . $array[$i];

        }
        $str = substr($str, 1);
        $sql = "SELECT $str FROM  $table WHERE $where";
        $result = $conn->query($sql);
        return $result;
    }
    function simpleNaturalJoin($t1,$t2){
        $tab = $t1.' NATURAL JOIN '.$t2;
        return $tab;

    }








}