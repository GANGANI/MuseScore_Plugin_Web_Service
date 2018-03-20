
<?php
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);

if ($_POST['update']){
    $title = $_POST['update'];
    $sql = "select plugin from plugin_details where Title=$title";
    $result = $conn->query($sql);
    $url = $result;
    header( "Location: $url" );
    $query2 = "insert into downloaded_plugins(Title) values $title";
    $conn->query($query2);

    include "Plugins.php";
}
include "user_plugin.php";
?>