<?php

require "admin/includes/dbh.php";
session_start();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

<!--- basic page needs
================================================== -->
<meta charset="utf-8">
<title>Kylcus Blog</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- mobile specific metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/vendor.css">
<link rel="stylesheet" href="css/styles.css">

<!-- script
================================================== -->
<script src="js/modernizr.js"></script>
<script defer src="js/fontawesome/all.min.js"></script>

<!-- favicons
================================================== -->
<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
<style>
    .alertError{
        padding: 20px;
        background-color: red; /* Red */
        color: white;
        margin-bottom: 15px;;
    }

    .alertSuccess{
        padding: 20px;
        background-color: green;
        color: white;
        margin-bottom: 15px;;
    }
</style>

</head>

<body id="top">


<!-- preloader
================================================== -->
<div id="preloader"> 
<div id="loader"></div>
</div>
<?php

include "header-opaque.php"

?>
    <section class="s-content" style="text-align:center;">
        <div style="text-align:center; display:inline-block; margin-left:auto;" class="divLogin">
  
    <form method="POST"  action ="includes/login.php" class="loginForm">
        <?php
        
        if(isset($_REQUEST['addcustomer'])){
            if($_REQUEST['addcustomer'] == "success"){
                echo "<div class='alertSuccess'>
                    <strong>Success!</strong> Now you can log in!
                </div>";
            }
            else if($_REQUEST['addcustomer'] == "error"){
                echo "<div class='alertErrror'>
                <strong>Danger!</strong> Error occurred! Try again later!
            </div>";
            }

            
        }

        if(isset($_REQUEST['login'])){
            if($_REQUEST['login'] == "emptyUsername"){
                echo "<div class='alertErrror'>
                <strong>Please!</strong> Enter username
            </div>";
            }
            else if($_REQUEST['login'] == "emptyPassword"){
                echo "<div class='alertErrror'>
                <strong>Please!</strong> Enter password!
            </div>";
            }
        }
        
        ?>
        <h2 class=""> LOGIN ADMIN</h2>
        
      
            <h3>Sign in</h3> <br><form action='' method='post'>
            <input type='text' name='uname' placeholder='Username'>
            <input type='password' name='password' placeholder='Password'>
            <button type='submit' name='login-btn'>Sign in</button>
             </form> <br>
            <a href='singup.php'>No account? Sing up for an account</a>
           
      
        
        


        </form>
        </div>
    </section>
<?php

include "footer.php"

?>



<!-- Java Script
================================================== -->
<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</body>

</html>