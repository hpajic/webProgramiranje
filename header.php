<?php

$sqlCategories = "SELECT * FROM blog_category";
$queryCategories = mysqli_query($conn, $sqlCategories);

?>
<head>
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css”/>
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />

</head>

<!-- header
================================================== -->
<header class="s-header">

<div class="s-header__logo">
    <a class="logo" href="index.php">
        <h2 style="color:white; font-family:monospace; display:table-cell; padding-top:18px">Kylcus</h2>
    </a>
</div>

<div class="row s-header__navigation">

    <nav class="s-header__nav-wrap">

        <h3 class="s-header__nav-heading h6">Navigate to</h3>

        <ul class="s-header__nav">
            <li class="current"><a href="index.php" title="">Home</a></li>
            <li class="has-children">
                <a href="category.php" title="">Categories</a>
                <ul class="sub-menu">
                    <?php
                    
                    while($rowCategories = mysqli_fetch_assoc($queryCategories)){

                        $categoryName = $rowCategories['v_category_title'];
                        $categoryPath = $rowCategories['v_category_path'];

                        echo "<li><a href='categories.php?group=".$categoryPath."'>$categoryName</a></li>";
                    }
                    
                    ?>
                    
                </ul>
            </li>
            
                <li><a href='about.php' >About</a></li>
                <li><a href='contact.php' >Contact</a></li>
            <li><?php

                    $sqlGetUserType = "SELECT * FROM users ";
                    $queryGetUserType = mysqli_query($conn, $sqlGetUserType);
                    $rowGetUserType = mysqli_fetch_array($queryGetUserType);
                    
                    
                    if (isset($_SESSION['user']) && $rowGetUserType['usertype'] == 'admin'){
                        
                        
                        echo "<li><a href='admin/blogs.php'>{$_SESSION['user']} | Admin Panel</a></li>";
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    
                }
                    elseif (isset($_SESSION['user']) && $rowGetUserType['usertype'] == 'user'){
                        
                            echo "<li><a href='logout.php'>Logout</a></li>";
                        
                     
                       
                    }
                    
                
                    else{
                        
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='singup.php'>Sign up</a></li>";
                        session_destroy();
                        
                    }
                
                
                
                ?></li>
            
            
            
            
        </ul> <!-- end s-header__nav -->

        <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

    </nav> <!-- end s-header__nav-wrap -->

</div> <!-- end s-header__navigation -->

<a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

<div class="s-header__search">

    <div class="s-header__search-inner">
        <div class="row wide">

            <form role="search" method="get" class="s-header__search-form" action="search.php">
                <label>
                    <span class="h-screen-reader-text">Search for:</span>
                    <input type="search" class="s-header__search-field" placeholder="Search for..." value="" name="query" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="s-header__search-submit" value="Search"> 
            </form>

            <a href="#0" title="Close Search" class="s-header__overlay-close">Close</a>

        </div> <!-- end row -->
    </div> <!-- s-header__search-inner -->

    
</div> <!-- end s-header__search wrap -->	

<a class="s-header__search-trigger" href="#">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.982 17.983"><path fill="#010101" d="M12.622 13.611l-.209.163A7.607 7.607 0 017.7 15.399C3.454 15.399 0 11.945 0 7.7 0 3.454 3.454 0 7.7 0c4.245 0 7.699 3.454 7.699 7.7a7.613 7.613 0 01-1.626 4.714l-.163.209 4.372 4.371-.989.989-4.371-4.372zM7.7 1.399a6.307 6.307 0 00-6.3 6.3A6.307 6.307 0 007.7 14c3.473 0 6.3-2.827 6.3-6.3a6.308 6.308 0 00-6.3-6.301z"/></svg>
</a>

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>

</header> <!-- end s-header -->

<script>
    var type_admin = '[@authfield:admin]';
    var type_user = '[@authfield:user]';
</script>