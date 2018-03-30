<?php
echo "aaa";
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);

$Title = $_POST['plugin'];
echo $Title;
$sql1 = "select plugin from plugin_details where Title='$Title'";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$plugin = $row['plugin'];


session_start();
$username = $_SESSION['username'];
$sql1 = "insert into downloadedPlugins(username,Title) values ('$username' , '$Title')";
$conn->query($sql1) or die($conn->error);

header( "Location: $plugin" );



?>