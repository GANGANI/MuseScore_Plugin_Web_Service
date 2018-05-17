<?php
$sereverName ='localhost';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);

if (($_POST['title'])!="" and ($_POST['API_Compatibility'])!="" and ($_POST['category'])!="" and ($_POST['author'])!="" and ($_POST['plugin'])!="") {

    //validating the adding plugin details

    $title = $_POST['title'];
    $apiCompatibility = $_POST['API_Compatibility'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $plugin = $_POST['plugin'];

    //check whether the exact same plugin is exist in database

    $sql_t = "SELECT * FROM plugin_details WHERE Title='$title'";
    $sql_p = "SELECT * FROM plugin_details WHERE plugin='$plugin'";
    $res_t=$conn->query($sql_t);
    $res_p=$conn->query($sql_p);

    //show error messages if exact same plugin is exist in database

    if (mysqli_num_rows($res_t) > 0) {
        $title_error = "Sorry... Title already taken";
        header("location:Add_plugins.php");
    }
    elseif (mysqli_num_rows($res_p) > 0) {
        $url_error = "Sorry... url already taken";
        header("location:Add_plugins.php");
    }
    else{
        $query = "INSERT INTO plugin_details(Title,category,Version,author,plugin,Accptance) VALUES ('$title','$category','$apiCompatibility','$author','$plugin','1')";
        $conn->query($query);
        header("location:Plugins.php");
        }
}
else{
    header("location:Add_plugins.php");
}

?>

//show error messages
<html>
<?php if (isset($title_error)): ?>
    <script>
        alert("Sorry...Entered title is already taken");
    </script>

<?php endif ?>

<?php if (isset($url_error)): ?>
    <script>
        alert("Sorry...Entered url is already uploaded");
    </script>
<?php endif ?>



</html>