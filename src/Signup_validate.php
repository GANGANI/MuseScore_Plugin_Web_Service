<?php

$sereverName ='127.0.0.1';
$userName = 'root';
$passWord = '';
$dbName = 'pluginmanager';
$conn = mysqli_connect($sereverName,$userName,$passWord,$dbName);

include "User.php";
if (($_POST['username'])!="" and ($_POST['password'])!="" and ($_POST['email'])!="" and ($_POST['user_type'])!="" and ($_POST['repeat_password'])!="" and ($_POST['password'])==($_POST['repeat_password'])) {

    //validate all signup details

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];

    //check whether the entered values are exist in database
    $sql_u = "SELECT * FROM m_user WHERE username='$username'";
    $sql_e = "SELECT * FROM m_user WHERE email='$email'";
    $sql_p = "SELECT * FROM m_user WHERE password='$password'";
    $res_u=$conn->query($sql_u) or die (mysqli_error($conn));
    $res_e=$conn->query($sql_e);
    $res_p=$conn->query($sql_p);
    if (mysqli_num_rows($res_u) > 0) {
        $name_error = "Sorry... username already taken";
        include "SignUp.php";
    }else if(mysqli_num_rows($res_e) > 0){
        $email_error = "Sorry... email already taken";
        include"SignUp.php";
    }else if(mysqli_num_rows($res_p) > 0){
        $pwd_error = "Sorry... password already taken";
        include "SignUp.php";
    }else{
            $user = new \App\User();
            $user->setUserDetails(['username','password','email','user_role_type'],[$username,$password,$email,$user_type]);
            include"Login.php";
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