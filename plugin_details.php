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

    $query = "INSERT INTO plugin_details(Title,category,Version,author,plugin) VALUES ('$title','$category','$apiCompatibility','$author','$plugin')";
    $conn->query($query);
    include "Plugins.php";
}
else{
    include "Add_plugins.php";
}

?>

