<?php
require "../admin/includes/dbh.php";
session_start();

if(isset($_POST['login-btn'])){
    $username = mysqli_real_escape_string($conn,$_POST['uname']) ;
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $pass = md5($password);

    $sqlCheckUser = "select * from users where username = '$username' and passsword = '$pass'";
    $queryCheckUser = mysqli_query($conn, $sqlCheckUser);

    if (empty($username)) {
        formError("emptyUsername");
        }
    else if (empty($password)){
            formError("emptyPassword");
        }

    if (mysqli_num_rows($queryCheckUser)) {
        $_SESSION['user'] = $username;
        header("Location: ../index.php");
        
       
        
    }
    else{
        header("Location: ../index.php");
        exit();
    }
}



function formError($errorCode) {

    require "../admin/includes/dbh.php";
    
    $_SESSION['username'] = $_POST['uname1'];
    $_SESSION['password'] = $_POST['password1'];
    
    

    mysqli_close($conn);
    header("Location: ../login.php?login=".$errorCode);
    exit();

}
?>