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

    $sql_t = "SELECT * FROM plugin_details WHERE Title='$title'";
    $sql_p = "SELECT * FROM plugin_details WHERE plugin='$plugin'";
    $res_t=$conn->query($sql_t);
    $res_p=$conn->query($sql_p);
    if (mysqli_num_rows($res_u) > 0) {
        $title_error = "Sorry... Title already taken";
        header("location:SignUp.php");
    }
    elseif (mysqli_num_rows($res_u) > 0) {
        $url_error = "Sorry... url already taken";
        header("location:SignUp.php");
    }
    else{
            $query = "INSERT INTO plugin_details(Title,category,Version,author,plugin) VALUES ('$title','$category','$apiCompatibility','$author','$plugin')";
            $conn->query($query);
            header("location:Plugins.php");
        }
}
else{
    header("location:Add_plugins.php");
}

?>

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