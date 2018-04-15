<?php
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);
$title=$_POST['update'];
$sql = "SELECT Title,category,Version,author FROM plugin_details where Title = '$title'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE HTML>

<html>
<head>
    <title>MuseScore - Plugins</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>
<body class="subpage">

<!-- Header -->
<header id="header">
    <div class="inner">
        <a href="index.html" class="logo">MuseScore</a>
        <nav id="nav">
            <a href="#">Logout</a>
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    </div>
</header>

<!-- Main -->
<section id="main" class="wrapper">
    <div class="inner">
        <header class="align-center">
            <h2>Update Plugin</h2>
            <p>Plugin Details | MuseScore</p>
        </header>

        <div class="row 200%">
            <div class="12u 12u$(medium)">
                <form method="POST" action="Updated_plugins_details.php" onsubmit="return checkForm(this);">
                    <div class="row uniform">

                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="Title" id="email" value=<?php echo $row['Title']?> placeholder=<?php echo $row['Title']?> readonly/>
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <div class="select-wrapper">
                                <select name="API_Compatibility" id="category">
                                    <option value="">- API Compatibility -</option>
                                    <option value="1.x" name="">1.x</option>
                                    <option value="2.x">2.x</option>
                                    <option value="3.x">3.x</option>
                                </select>
                            </div>
                            <!--<input type="email" name="email" id="email" value="" placeholder="API Compatibility" />-->
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="category" id="name2" value=<?php echo $row['category']?>  placeholder=<?php echo $row['category']?> readonly/>
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="author" id="name3" value=<?php echo $row['author']?> placeholder="Author" />
                        </div>
                        <div class="6u 12u$(xsmall)">
                            <input type="text" name="plugin" id="url" value="" placeholder="Add plugin link" />
                        </div>
                        <!-- Break -->
                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit"  value="Update Plugin" onclick="Validate()" /></li>
                            </ul>
                        </div>

                    </div>
                </form>





            </div>
        </div>

    </div>
</section>



<!-- Scripts -->
<script src="../Validation/addPluginValidation.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/skel.min.js"></script>
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>

</body>
</html>