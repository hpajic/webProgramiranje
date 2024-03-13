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

</head>

<body id="top">


<!-- preloader
================================================== -->
<div id="preloader"> 
<div id="loader"></div>
</div>
<?php

include "header.php"

?>

<!-- hero
================================================== -->
<section id="hero" class="s-hero">

        <div class="s-hero__slider">

            <?php 
            
            $sqlGetFirstBlog = "SELECT * FROM blog_post INNER JOIN blog_category ON blog_post.n_category_id = blog_category.n_category_id WHERE n_home_page_placement = '1' AND f_post_status != '2' LIMIT 1";
            $queryGetFirstBlog = mysqli_query($conn, $sqlGetFirstBlog);

            if ($rowGetFirstBlog = mysqli_fetch_assoc($queryGetFirstBlog)) {

                $firstBlogCategory = $rowGetFirstBlog['v_category_title'];
                $firstBlogCategoryPath = $rowGetFirstBlog['v_category_path'];
                $firstBlogTitle = $rowGetFirstBlog['v_post_title'];
                $firstBlogPath = $rowGetFirstBlog['v_post_path'];
                $firstBlogMainImageUrl = $rowGetFirstBlog['v_main_image_url'];
            ?>

            <div class="s-hero__slide">
                <div class="s-hero__slide-bg" style="background-image: url('<?php echo $firstBlogMainImageUrl; ?>');"></div>
                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="cat-links">
                                <a href="categories.php?group=<?php echo $firstBlogCategoryPath; ?>"><?php echo $firstBlogCategory; ?></a>
                            </span>
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="about.php">Hrvoje P.</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="single-blog.php?blog=<?php echo $firstBlogPath; ?>"><?php echo $firstBlogTitle; ?></a>
                        </h1>
                    </div>
                </div>
            </div>

            <?php
            }
            
            $sqlGetSecondBlog = "SELECT * FROM blog_post INNER JOIN blog_category ON blog_post.n_category_id = blog_category.n_category_id WHERE n_home_page_placement = '2' AND f_post_status != '2' LIMIT 1";
            $queryGetSecondBlog = mysqli_query($conn, $sqlGetSecondBlog);

            if ($rowGetSecondBlog = mysqli_fetch_assoc($queryGetSecondBlog)) {

                $secondBlogCategory = $rowGetSecondBlog['v_category_title'];
                $secondBlogCategoryPath = $rowGetSecondBlog['v_category_path'];
                $secondBlogTitle = $rowGetSecondBlog['v_post_title'];
                $secondBlogPath = $rowGetSecondBlog['v_post_path'];
                $secondBlogMainImageUrl = $rowGetSecondBlog['v_main_image_url'];
            
            ?>

            <div class="s-hero__slide">
                <div class="s-hero__slide-bg" style="background-image: url('<?php echo $secondBlogMainImageUrl; ?>');"></div>
                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="cat-links">
                                <a href="categories.php?group=<?php echo $secondBlogCategoryPath; ?>"><?php echo $secondBlogCategory; ?></a>
                            </span>
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="about.php">Hrvoje P.</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="single-blog.php?blog=<?php echo $secondBlogPath; ?>"><?php echo $secondBlogTitle; ?></a>
                        </h1>
                    </div>
                </div>
            </div>

            <?php 
            }


            $sqlGetThirdBlog = "SELECT * FROM blog_post INNER JOIN blog_category ON blog_post.n_category_id = blog_category.n_category_id WHERE n_home_page_placement = '3' AND f_post_status != '2' LIMIT 1";
            $queryGetThirdBlog = mysqli_query($conn, $sqlGetThirdBlog);

            if ($rowGetThirdBlog = mysqli_fetch_assoc($queryGetThirdBlog)) {

                $thirdBlogCategory = $rowGetThirdBlog['v_category_title'];
                $thirdBlogCategoryPath = $rowGetThirdBlog['v_category_path'];
                $thirdBlogTitle = $rowGetThirdBlog['v_post_title'];
                $thirdBlogPath = $rowGetThirdBlog['v_post_path'];
                $thirdBlogMainImageUrl = $rowGetThirdBlog['v_main_image_url'];
            
      ?>

            <div class="s-hero__slide">

                <div class="s-hero__slide-bg" style="background-image: url('<?php echo $thirdBlogMainImageUrl; ?>');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <span class="cat-links">
                            <a href="categories.php?group=<?php echo $thirdBlogCategoryPath; ?>"><?php echo $thirdBlogCategory; ?></a>
                            </span>
                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <a href="about.php">Hrvoje Pajic</a>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                        <a href="single-blog.php?blog=<?php echo $thirdBlogPath; ?>"><?php echo $thirdBlogTitle; ?></a>
                        </h1>
                    </div>
                </div>

            </div>


        <?php
        
            }
        
        ?>
    

    

</div> 

<div class="s-hero__social hide-on-mobile-small">
    <p>Follow</p>
    <span></span>
    <ul class="s-hero__social-icons">
        <li><a href="http://facebook.com"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
        <li><a href="http://twitter.com"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="https://instagram.com"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
        <li><a href="https://youtube.com"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
    </ul>
</div> <!-- end s-hero__social -->



</section> <!-- end s-hero -->


<!-- content
================================================== -->
<section class="s-content s-content--no-top-padding">


<!-- masonry
================================================== -->
<div class="s-bricks">

    <div class="masonry">
        <div class="bricks-wrapper h-group">

            <div class="grid-sizer"></div>

            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <?php
            
            $sqlGetAllBlogs = "SELECT * FROM blog_post WHERE f_post_status ='1' ORDER BY n_blog_post_id DESC";
            $queryGetAllBlogs = mysqli_query($conn, $sqlGetAllBlogs);

            while ($rowGetAllBlogs = mysqli_fetch_assoc($queryGetAllBlogs)){
                $blogTitle = $rowGetAllBlogs['v_post_title'];
                $blogPath = $rowGetAllBlogs['v_post_path'];
                $blogSummary = $rowGetAllBlogs['v_post_summary'];
                $blogAltImateUrl = $rowGetAllBlogs['v_alt_image_url'];

           ?>

            <article class="brick entry" data-aos="fade-up">

                <div class="entry__thumb">
                    <a href="single-blog.php?blog=<?php echo $blogPath; ?>" class="thumb-link">
                        <img src="<?php echo $blogAltImateUrl; ?>" 
                                srcset="<?php echo $blogAltImateUrl; ?> 1x, <?php echo $blogAltImateUrl; ?> 2x" alt="">
                    </a>
                </div> <!-- end entry__thumb -->

                <div class="entry__text">
                    <div class="entry__header">
                        <h1 class="entry__title"><a href="single-blog.php?blog=<?php echo $blogPath; ?>"> <?php echo $blogTitle; ?></a></h1>
                        
                        <div class="entry__meta">
                            <span class="byline"">By:
                                <span class='author'>
                                    <a href="about.php">Hrvoje P.</a>
                            </span>
                        </span>
                           
                        </div>
                    </div>
                    <div class="entry__excerpt">
                        <p>
                        <?php echo $blogSummary;?>
                        </p>
                    </div>
                    <a class="entry__more-link" href="single-blog.php?blog=<?php echo $blogPath; ?>">Read Blog</a>
                </div> <!-- end entry__text -->
            
            </article> <!-- end article -->


            <?php
            
            }
            
            ?>

           

        </div> <!-- end brick-wrapper -->

    </div> <!-- end masonry -->

    

</div> <!-- end s-bricks -->

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