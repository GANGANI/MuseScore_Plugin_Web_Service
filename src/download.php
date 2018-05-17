<?php

include "plugin.php";

//get downloaded plugin details by plugin title

$Title = $_POST['plugin'];
$plugin = new \App\plugin();
$result = $plugin->getPluginDetails(['plugin'],$Title);

$row = $result->fetch_assoc();
$Plugin = $row['plugin'];

//store details of downloaded plugins by title and

session_start();
$username = $_SESSION['username'];
$plugin->setPluginDetails(['username','Title'],[$username,$Title]);
header( "Location: $Plugin" );

?>