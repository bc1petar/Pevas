<?php
session_start();

if (isset($_POST['submit'])) {

    $bp = mysqli_connect("localhost", "root", "", "pev");
    if (!$bp) {
        die("Problem sa povezivanjem sa bazom podataka");
    }

    $uid = mysqli_real_escape_string($bp, $_POST['uid']);
    $pwd = mysqli_real_escape_string($bp, $_POST['pwd']);


    if (empty($uid) || empty($pwd)) {
        echo '<script type="text/javascript">'; 
echo 'alert("Username/email ili password nije tacan");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($bp, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            echo '<script type="text/javascript">'; 
echo 'alert("Username/email ili password nije tacan");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {

                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);                                    // DEHASHOVANJE PW-A

                if ($hashedPwdCheck == false) {
                    echo '<script type="text/javascript">'; 
echo 'alert("Username/email ili password nije tacan");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
                    exit();
                } elseif ($hashedPwdCheck == true) {


                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    header("Location: loggedin.php");
                    exit();
                }
            }
        }
    }
} else {
    echo '<script type="text/javascript">'; 
echo 'alert("Username/email ili password nije tacan");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
    exit();
}