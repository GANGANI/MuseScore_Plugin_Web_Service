
<html>
<head>
    <title>MuseScore</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]>
    <script src="../assets2/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../assets2/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="../assets2/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../assets2/css/ie9.css"/><![endif]-->
</head>
<body class="landing">

<!-- Header -->
<header id="header" class="alt">
    <h1><a href="home.php">MuseScore</a></h1>
    <a href="#nav">Menu</a>
</header>

<!-- Nav -->
<nav id="nav">
    <ul class="links">
        <li><a href="home.php">Home</a></li>
    </ul>
</nav>

<!-- Banner -->
<section id="banner">
    <h2>MuseScore</h2>
    <p>WORLD’S MOST POPULAR NOTATION SOFTWARE</p>
    <form action="Login_validate.php" method="POST">
        <div class="container 75%">
            <div class="row uniform 50%">
                <div class="6u 12u$(xsmall)">
                    <h4>Username</h4>
                    <input name="username" placeholder="Username" type="text" id="username" />
                </div>
                <div class="6u$ 12u$(xsmall)">
                    <h4>Password</h4>
                    <input name="password" placeholder="Password" type="password" id="password"/>
                </div>
            </div>
        </div>
        <ul class="actions">
            <li><button type="submit" class="btn tf-btn btn-default" name='from' value="Login" id="login">SignIn</button></li>
        </ul>

    </form>
    <form action="SignUp.php" method="POST">
        <ul class="actions">
            <li><button type="submit" class="btn tf-btn btn-default" name='from' value="1">SignUp</button></li>
        </ul>
    </form>

</section>


<!-- Scripts -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/skel.min.js"></script>
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>

</body>
