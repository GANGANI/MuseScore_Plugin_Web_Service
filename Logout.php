<?php

/**
 * Created by PhpStorm.
 * User: Gangani
 * Date: 2/9/2018
 * Time: 4:49 AM
 */

    session_start();
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-42000,'/');
    }
    session_destroy();
    header("location:Login.php");
?>
