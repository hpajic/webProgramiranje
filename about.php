<?php
session_start();
require "admin/includes/dbh.php";

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

<!--- basic page needs
================================================== -->
<meta charset="utf-8">
<title>About - Kyclus</title>
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

<!-- content
================================================== -->
<section class="s-content">

    <div class="row">
        <div class="column large-12">

            <article class="s-content__entry">

                <div class="s-content__media">
                    <img src="images/thumbs/about/about-1050.jpg" 
                            srcset="images/thumbs/about/about-2100.jpg 2100w, 
                                    images/thumbs/about/about-1050.jpg 1050w, 
                                    images/thumbs/about/about-525.jpg 525w" sizes="(max-width: 2100px) 100vw, 2100px" alt="">

                </div> <!-- end s-content__media -->

                <div class="s-content__entry-header">
                    <h1 class="s-content__title">Learn More About Story.</h1>
                </div> <!-- end s-content__entry-header -->

                <div class="s-content__primary">

                    <div class="s-content__page-content">

                        <p class="lead">
                        My name is Kylcus and I am artist. I love to take pictures as much as drawing them.
                            </p> 

                            <p>
                            I created this blog so I could share my love to art with everyone else. Hope You liked some of my pictures/drawings. Also if u 
                            have any questions don't hesitate to contact me!
                            </p>

                        <br>

                      
                    </div> <!-- end s-entry__page-content -->

                </div> <!-- end s-content__primary -->
            </article> <!-- end entry -->

        </div> <!-- end column -->
    </div> <!-- end row -->

</section> <!-- end s-content -->


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