<?php
include 'User.php';

if (isset($_POST['username']) and isset($_POST['password'])){

    //validate the user login

    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new \App\User();
    $result = $user->getUsername($username,$password);
    $query2 = "SELECT Acceptance FROM m_user  WHERE username = '$username' and password = '$password'";

    session_start();
    $_SESSION['username'] = $username;
    $sereverName ='localhost';
    $userName = 'root';
    $passWord = '';
    $dbName = 'pluginmanager';
    $conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);
    $result2 = mysqli_query($conn,$query2);
    $row = $result2->fetch_assoc();
    $acceptance = $row['Acceptance'];
    $count = mysqli_num_rows($result);

    //Validate user login by checking username and password

    if($count==1){
        if($acceptance=="0"){

            $user = new \App\User();
            $result = $user->getUserRole($username,$password);
            $row = $result->fetch_assoc();
            $user_type = $row['user_role_type'];

            //filter the login by user type, check whether the logged person is developer or user

            if ($user_type=="developer"){
                header("location:Plugins.php");
            }
            if ($user_type=="user") {
                header("location:home.html");
            }
        }
        else{
            $message1 = "Your Account is removed";
            include "Login.php";
        }
    }
    else{
        $message2 = "enter user name password correctly";
        include "Login.php";
    }
}
else{
    $message2 = "enter user name password correctly";
    include "Login.php";
}

//validate the user login and show error messages

?>
<html>
<?php if (isset($message1)): ?>
    <script>
        alert("Sorry...Your Account is removed");
    </script>

<?php endif ?>

<?php if (isset($message2)): ?>
    <script>
        alert("Please enter username password correctly");
    </script>

<?php endif ?>
</html>

