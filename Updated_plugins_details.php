<?php
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);

if (($_POST['title'])!="" and ($_POST['API_Compatibility'])!="" and ($_POST['category'])!="" and ($_POST['author'])!="" and ($_POST['plugin'])!="") {
    $title = $_POST['title'];
    $apiCompatibility = $_POST['API_Compatibility'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $plugin = $_POST['plugin'];
    //session_start();
    //$_SESSION['plugin'] = $title;

    $query = "update plugin_details set author=$author, plugin=$plugin, Version=$apiCompatibility where title=$title ";
    $conn->query($query);

    $query2 = "insert into updated_plugins(plugin_id) values (select plugin_id from plugin_details where Title=$title)";
    include "Plugins.php";
}

?>