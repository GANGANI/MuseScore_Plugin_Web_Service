
<?php
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);

if (($_POST['search'])!=""){

    //search for available plugins

    $search = $_POST['search_result'];
    $searchbtn = $_POST['search'];
    session_start();
    $_SESSION['search_result'] = $search;
    $_SESSION['search'] = $searchbtn;
    header("location:Login.php");

    include "Search_Result.php";
}
