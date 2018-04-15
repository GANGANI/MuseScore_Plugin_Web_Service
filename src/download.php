<?php

include "plugin.php";

$Title = $_POST['plugin'];
$plugin = new plugin();
$result = $plugin->getPluginDetails(['plugin'],$Title);

$row = $result->fetch_assoc();
$Plugin = $row['plugin'];

session_start();
$username = $_SESSION['username'];
$plugin->setPluginDetails(['username','Title'],[$username,$Title]);
header( "Location: $Plugin" );

?>