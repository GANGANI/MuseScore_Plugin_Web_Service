<?php
$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);

?>
<html>
<head>
    <title>MuseScore - Plugins</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="subpage">

<!-- Header -->
<header id="header">
    <div class="inner">
        <a href="index.html" class="logo">MuseScore</a>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    </div>
</header>

<!-- Main -->
<section id="main" class="wrapper">
    <div class="inner">
        <header class="align-center">
            <h2>Plugins</h2>
            <p></p>
        </header>
        <div class="row 200%">
            <div class="6u 12u$(medium)">
                <form method="post" action="#">
                    <div class="row uniform">
                        <div class="9u 12u$(small)">
                            <input type="text" name="query" id="query" value="" placeholder="Search" />
                        </div>
                        <div class="3u$ 12u$(small)">
                            <input type="submit" value="Search" class="small" />
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row 200%">
            <div class="12u 12u$(medium)">

                <div class="table-wrapper">
                    <table align="center">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>API Compatibility</th>
                            <th>Author</th>
                            <th>Update</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "select Title,category,version,plugin,author from plugin_details natural JOIN updated_plugin ";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
											<td>' . $row['Title'] . '</td>
											<td>' . $row['category'] . '</td>
											<td>' . $row['version'] . '</td>
											<td>' . $row['author'] . '</td>
											<td><form action="download.php" method="POST"> 
												<button type="submit" name ="plugin" value ="' . $row['Title'] .'" >Update</button>
											</form>
											</td>
											</tr>';

                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <div class="flex">
                    <div class="copyright">
                        &copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
                    </div>
                    <ul class="icons">
                        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
                        <li><a href="#" class="icon fa-pinterest-p"><span class="label">Pinterest</span></a></li>
                        <li><a href="#" class="icon fa-vimeo"><span class="label">Vimeo</span></a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

</body>
</html>