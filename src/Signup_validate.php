<?php


$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);


if (($_POST['username'])!="" and ($_POST['password'])!="" and ($_POST['email'])!="" and ($_POST['user_type'])!="" and ($_POST['repeat_password'])!="" and ($_POST['password'])==($_POST['repeat_password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $sql_u = "SELECT * FROM m_user WHERE username='$username'";
    $sql_e = "SELECT * FROM m_user WHERE email='$email'";
    $sql_p = "SELECT * FROM m_user WHERE email='$password'";
    $res_u=$conn->query($sql_u);
    $res_e=$conn->query($sql_e);
    $res_p=$conn->query($sql_p);
    if (mysqli_num_rows($res_u) > 0) {
        $name_error = "Sorry... username already taken";
        header("location:SignUp.php");
    }else if(mysqli_num_rows($res_e) > 0){
        $email_error = "Sorry... email already taken";
        header("location:SignUp.php");
    }else if(mysqli_num_rows($res_p) > 0){
        $pwd_error = "Sorry... password already taken";
        header("location:SignUp.php");
    }else{
            $user = new user();
            $user->setUserDetails(['username','password','email','user_role_type'],[$username,$password,$email,$user_type]);
            //$query = "INSERT INTO m_user(username,password,email,user_role_type) VALUES ('$username','$password','$email','$user_type')";
            //$conn->query($query);
            header("location:Login.php");
    }
}
else{
    include "SignUp.php";
}

?>
<html>
<?php if (isset($name_error)): ?>
    <script>
        alert("Sorry...Entered username is already taken");
    </script>

<?php endif ?>

<?php if (isset($email_error)): ?>
    <script>
        alert("Sorry...Entered email is already taken");
    </script>
<?php endif ?>

<?php if (isset($pwd_error)): ?>
    <script>
        alert("Sorry...Entered password is already taken");
    </script>
<?php endif ?>

</html>