<?php
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);

if (($_POST['API_Compatibility'])!="" and ($_POST['author'])!="" and ($_POST['plugin'])!="") {
    $title = $_POST['Title'];
    $apiCompatibility = $_POST['API_Compatibility'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $plugin = $_POST['plugin'];
    //session_start();
    //$_SESSION['plugin'] = $title;

    $query = "update plugin_details set author='$author', plugin='$plugin', Version='$apiCompatibility' where Title='$title' ";
    $conn->query($query) or die($conn->error);


    $query2 = "insert into updated_plugin(Title) values ('$title')";
    $conn->query($query2) or die($conn->error);

    include "Plugins.php";
}
?>