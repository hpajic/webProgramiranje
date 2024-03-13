<?php
require "../admin/includes/dbh.php";
session_start();

if(isset($_POST['signin-btn'])){
            $username = mysqli_real_escape_string($conn,$_POST['uname1']) ;
            $password = mysqli_real_escape_string($conn,$_POST['password1']);
            $firstname = mysqli_real_escape_string($conn,$_POST['fname']);
            $lastname = mysqli_real_escape_string($conn,$_POST['lname']);

            $newPassword = md5($password);

            $sqlCheckUsername = "SELECT * FROM users WHERE username = '$username'";
            $queryCheckUsername = mysqli_query($conn, $sqlCheckUsername);

            if (mysqli_num_rows($queryCheckUsername) > 0)
            {
                formError("usernamebeingused");
            }
            else{
                $sqlAddCustomer = "INSERT INTO users (firstname, lastname, username, passsword)
                                    VALUES ('$firstname', '$lastname', '$username', '$newPassword')";
            }

            


    if (empty($username)) {
    formError("emptyUsername");
    }
    else if (empty($firstname)){
        formError("emptyName");
    }
    else if (empty($password)){
        formError("emptyPassword");
    }
    else if (empty($lastname)){
        formError("emptyLastName");
    }

    if(mysqli_query($conn, $sqlAddCustomer)){
        
        header("Location: ../login.php?addcustomer=success");
        exit();
    }
    else{
        mysqli_close($conn);
        header("Location: ../login.php?addcustomer=error");
        exit();
    }
}

else{
    header("Location: ../index.php");
    exit();
}










function formError($errorCode) {

    require "../admin/includes/dbh.php";
    
    $_SESSION['username'] = $_POST['uname1'];
    $_SESSION['password'] = $_POST['password1'];
    $_SESSION['firstname'] = $_POST['fname'];
    $_SESSION['lastname'] = $_POST['lname'];
    

    mysqli_close($conn);
    header("Location: ../singup.php?addcustomer=".$errorCode);
    exit();

}

?>