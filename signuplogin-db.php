<?php

if (isset($_POST['submit'])) {

    $bp = mysqli_connect("localhost", "root", "", "pev");
    if (!$bp) {
        die("Problem sa povezivanjem sa bazom podataka");
    }

    $first = mysqli_real_escape_string($bp, $_POST['first']);
    $last = mysqli_real_escape_string($bp, $_POST['last']);
    $email = mysqli_real_escape_string($bp, $_POST['email']);
    $uid = mysqli_real_escape_string($bp, $_POST['uid']);
    $pwd = mysqli_real_escape_string($bp, $_POST['pwd']);

    // ERROR HANDLERS

    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        echo '<script type="text/javascript">'; 
echo 'alert("Niste popunili sva polja");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
        exit();
    }

    if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
        echo '<script type="text/javascript">'; 
echo 'alert("Pogresan unos imena ili prezimena");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
        exit();
    } else {
        // CHECK IF EMAIL IS VALID

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script type="text/javascript">'; 
echo 'alert("Pogresan unos email-a");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
            exit();
        } else {
            $s = "SELECT * FROM users WHERE user_email = '$email'";
            $res = mysqli_query($bp, $s);
            if (!$res) {
                echo '<script type="text/javascript">'; 
echo 'alert("Email je vec u upotrebi");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE user_uid = '$uid'";
                $result = mysqli_query($bp, $sql);
                $resultCheck = mysqli_num_rows($result);
                if (!$result) {
                    echo '<script type="text/javascript">'; 
echo 'alert("Username je vec u upotrebi");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
                    exit();
                } else {
                    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first','$last','$email','$uid','$hashedPwd');";
                    mysqli_query($bp, $sql);
                } header("Location: loginform.php");
                exit();
            }
        }
    }
} else {
    header("Location: index.php");
    exit();
}


    
