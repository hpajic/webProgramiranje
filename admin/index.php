<?php

include "includes/unset-sessions.php";
require "includes/dbh.php";
require "../count.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kylcus</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
       <?php
       
       include "header.php"; include "sidebar.php";
       
       ?>
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard 
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>13</h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Total Visits

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-book fa-5x"></i>
                                <h3><?php
                                
                                    $getAllBlogs = "SELECT * FROM blog_post WHERE f_post_status = '1' ";
                                    $queryGetAllBlogs = mysqli_query($conn, $getAllBlogs);

                                    $numBlogs = mysqli_num_rows($queryGetAllBlogs);
                                                                    
                                         echo $numBlogs;
                                
                                ?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Blogs

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa fa-comments fa-5x"></i>
                                <h3> <?php

                                    $getAllComments = "SELECT * FROM blog_comments ";
                                    $queryGetAllComments =mysqli_query($conn, $getAllComments);

                                    $numComments = mysqli_num_rows($queryGetAllComments);
                                                                    
                                         echo $numComments;
                                
                                ?> </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                               Comments

                            </div>
                        </div>
                    </div>
                  
                </div>
                
                <!-- /. ROW  -->
				<?php
                
                include "footer.php";
                
                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>