<?php
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);


if (($_POST['username'])!="" and ($_POST['password'])!="" and ($_POST['email'])!="" and ($_POST['user_type'])!="" and ($_POST['repeat_password'])!="" and ($_POST['password'])==($_POST['repeat_password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];

    $query = "INSERT INTO m_user(username,password,email,user_role_type) VALUES ('$username','$password','$email','$user_type')";
    $conn->query($query);
    include "Login.php";
}
else{
    include "SignUp.php";
}