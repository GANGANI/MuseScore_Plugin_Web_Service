<?php
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);


if (isset($_POST['username']) and isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT username FROM m_user  WHERE username = '$username' and password = '$password'";
    session_start();
    $_SESSION['username'] = $username;
    $result = mysqli_query($conn,$query) or die (mysqli_error($conn));
    $count = mysqli_num_rows($result);
    if($count==1){

        $query = "SELECT user_role_type FROM m_user  WHERE username = '$username' and password = '$password'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $user_type = $row['user_role_type'];
        if ($user_type=="developer"){
            include "Plugins.php";
        }
        if ($user_type=="user") {
            include "user_plugin.php";
        }
    }
    else{
        $message = "enter user name password correctly";
        include "Login.php";
    }
}

