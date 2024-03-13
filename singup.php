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
        background-color: red;
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

    
    <section class="s-content" style="text-align:center;" >
        <div style="text-align:center; display:inline-block;" class="divLogin">
  
    <form method="POST"  action ="includes/signup.php" class="loginForm">

        <h2 class=""> LOGIN ADMIN</h2>
        <?php
        
            if(isset($_REQUEST['addcustomer'])){
                if($_REQUEST['addcustomer'] == 'emptyUsername'){
                    echo "<div class='alertError'>
                        <strong>Error!</strong> Please add Username!.
                    
                    </div>";
                }
            
                else if ($_REQUEST['addcustomer'] == 'emptyName'){
                    echo "<div class='alertError'>
                        <strong>Error!</strong> Please add name!.
                    
                    </div>";
                }
                else if ($_REQUEST['addcustomer'] == 'emptyLastName'){
                    echo "<div class='alertError'>
                        <strong>Error!</strong> Please add last name!.
                    
                    </div>";
                }
                else if ($_REQUEST['addcustomer'] == 'emptyPassword'){
                    echo "<div class='alertError'>
                        <strong>Error!</strong> Please add password!.
                    
                    </div>";
                }
                else if ($_REQUEST['addcustomer'] == 'usernamebeingused'){
                    echo "<div class='alertError'>
                        <strong>Error!</strong> This user name is in use pick another one!.
                    
                    </div>";
                }
            }

        ?>
        
            <h3>Sign up</h3>
            <br><form action='' method='post'>
            <input type='text' name='uname1' placeholder='Username'>
            <input type='password' name='password1' placeholder='Password'>
            
            <input type='text' name='fname' placeholder='Firstname'>
            <input type='text' name='lname' placeholder='Lastname'>
            <button type='submit' name='signin-btn'>Sign up</button>
            </form> <br>
            <a href='login.php'>Have an account? Login instead.</a>
    
        
        


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
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- jQuery Js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>

</body>

</html>