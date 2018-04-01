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
    $sql_p = "SELECT * FROM plugin_details WHERE plugin='$plugin'";
    $res_p = $conn->query($sql_p);
    if (mysqli_num_rows($res_p) > 0) {
        $url_error = "Sorry... url already taken";
        include "SignUp.php";
    } else {
        $query = "update plugin_details set author='$author', plugin='$plugin', Version='$apiCompatibility' where Title='$title' ";
        $conn->query($query) or die($conn->error);


        $query2 = "insert into updated_plugin(Title) values ('$title')";
        $conn->query($query2) or die($conn->error);

        include "Plugins.php";
    }
}
else{
        include "update_plugin.php";
    }

?>

<html>
<?php if (isset($url_error)): ?>
    <script>
        alert("Sorry...Entered url is already uploaded");
    </script>
<?php endif ?>



</html>
