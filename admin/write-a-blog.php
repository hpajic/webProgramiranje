<?php 

require "includes/dbh.php";
session_start();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Write a blog</title>
<!-- Bootstrap Styles-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FontAwesome Styles-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- Custom Styles-->
<link href="assets/css/custom-styles.css" rel="stylesheet" />
<!-- Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<!-- Summernote -->
<link href='summernote/summernote.min.css' rel='stylesheet' type='text/css' />


</head>
<body>
<div id="wrapper">

<?php include "header.php"; include "sidebar.php"; ?>

<div id="page-wrapper" >
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Write A Blog
            </h1>
        </div>
    </div> 
    <?php
    
    if(isset($_REQUEST['addblog'])){
        if($_REQUEST['addblog'] == 'emptytitle'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please add a blog title.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'emptycategory'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please select a blog category.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'emptysummary'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please enter summary.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'emptycontent'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please add content.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'emptytags'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please add some tags.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'emptypath'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please add a blog path.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'sqlerror'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please try again.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'pathcontainsspaces'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please try again but do not add any spaces in the blog path.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'emptymainimage'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please upload a main image.
            
            </div>";
        } 
        else if($_REQUEST['addblog'] == 'emptyaltimage'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please upload a alternate image.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'mainimageerror'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please add another main image.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'altimageerror'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Please add another alternate image.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'invalidmainimage'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Main Image only supports jpg, jpeg, png, gif, bmp images.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'invalidaltimage'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Alternate Image only supports jpg, jpeg, png, gif, bmp images.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'erroruploadingmainimage'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> There was and error while uploading. Try again later.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'erroruploadingaltimage'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> There was and error while uploading. Try again later.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'titlebeingused'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> The title is being used in another blog. Pick another.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'pathbeingused'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> The blog path is being used in another blog. Pick another.
            
            </div>";
        } 
        if($_REQUEST['addblog'] == 'homepageplacementerror'){
            echo "<div class='alert alert-danger'>
                <strong>Error!</strong> Something happed while trying to set the home page placement.
            
            </div>";
        } 
    }
   

    
    
    ?>
    

    <div class="row">
        <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Enter your Blog. All fields must be fulfilled!
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="includes/add-blog.php" enctype="multipart/form-data" onsubmit="return validateImage();">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="blog-title" value="<?php if (isset($_SESSION['blogTitle'])) { echo $_SESSION['blogTitle'];} ?>"> 
                            </div> 
                            
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input class="form-control" name="blog-meta-title" value="<?php if (isset($_SESSION['blogMetaTitle'])) { echo $_SESSION['blogMetaTitle'];} ?>">
                            </div>
                            <div class="form-group">
                                <label>Blog Category</label>
                                <select class="form-control" name="blog-category" value="<?php if (isset($_SESSION['blogCategory'])) { echo $_SESSION['blogCategory'];} ?>">
                                    <option value="">Select a category</option>
                                    <?php 
                                    
                                    $sqlCategories = "SELECT * FROM blog_category";
                                    $queryCategories = mysqli_query($conn, $sqlCategories);

                                    while ($rowCategories = mysqli_fetch_assoc($queryCategories)) {

                                        $cId = $rowCategories['n_category_id'];
                                        $cName = $rowCategories['v_category_title'];

                                        if(isset($_SESSION['blogCategoryId'])){
                                            if($_SESSION['blogCategoryId'] == $cId){
                                                echo "<option value='".$cId."' selected=''>".$cName."</option>";
                                            }
                                            else{
                                                echo "<option value='".$cId."'>".$cName."</option>";
                                            }
                                        }
                                        else{
                                            echo "<option value='".$cId."'>".$cName."</option>";
                                        }
                                        
                                            
                                
                                    
                                }
                                    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Main Image</label>
                                <input type="file" name="main-blog-image" id="main-blog-image">
                            </div>
                            <div class="form-group">
                                <label>Alternate Image</label>
                                <input type="file" name="alt-blog-image" id="alt-blog-image">
                            </div>
                            <div class="form-group">
                                <label>Blog Summary</label>
                                <textarea class="form-control" rows="3" name="blog-summary" ><?php if (isset($_SESSION['blogSummary'])) { echo $_SESSION['blogSummary'];} ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Blog Content</label>
                                <textarea class="form-control" rows="3" name="blog-content" id="summernote"><?php if (isset($_SESSION['blogContent'])) { echo $_SESSION['blogContent'];} ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Blog Tags (separated by comma)</label>
                                <input class="form-control" name="blog-tags" value="<?php if (isset($_SESSION['blogTags'])) { echo $_SESSION['blogTags'];} ?>">
                            </div>
                            <div class="form-group">
                                <label>Blog Path</label>
                                <div class="input-group">
                                    <span class="input-group-addon">www.kylcus.com/</span>
                                    <input type="text" class="form-control" name="blog-path" value="<?php if (isset($_SESSION['blogPath'])) { echo $_SESSION['blogPath'];} ?>">
                                </div>
                            </div>
                            <div class="form-group">
                            <label>Home Page Placement</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline1" value="1" <?php if (isset($_SESSION['blogHomePagePlacement'])) { if ($_SESSION['blogHomePagePlacement'] == 1) { echo "checked=''";}} ?>>1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline2" value="2" <?php if (isset($_SESSION['blogHomePagePlacement'])) { if ($_SESSION['blogHomePagePlacement'] == 2) { echo "checked=''";}} ?>>2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="blog-home-page-placement" id="optionsRadiosInline3" value="3" <?php if (isset($_SESSION['blogHomePagePlacement'])) { if ($_SESSION['blogHomePagePlacement'] == 3) { echo "checked=''";}} ?>>3
                                            </label>
                            </div>
                            <button type="submit" class="btn btn-default" name="submit-blog">Add Blog</button>
                        </form>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<?php include "footer.php"; ?>
</div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>

<!-- Summernote -->
<script src="summernote/summernote.min.js"></script>

<script>
    $(document).ready(function() {
  $('#summernote').summernote({
    height : 300,
    minHeight: null,
    maxHegiht: null,
    focus: false
  });
});
</script>

<script>

        function validateImage(){

            var main_img = $("#main-blog-image").val(); // get image po id-u
            var alt_img = $("#alt-blog-image").val();

            var exts = ['jpg' , 'jpeg', 'png', 'gif', 'bmp'];

            var get_ext_main_img = main_img.split('.'); // dohvacanje extensiona od img
            var get_ext_alt_img = alt_img.split('.');

            get_ext_main_img = get_ext_main_img.reverse(); //mora ici reverse kako bi se na kraju mogao uhvatit extension
            get_ext_alt_img = get_ext_alt_img.reverse();


            main_image_check = false;
            alt_image_check = false;

            if(main_img.length > 0){
                if($.inArray(get_ext_main_img[0].toLowerCase(), exts) >= -1){
                    main_image_check = true;
                }
                else{
                alert("Error -> Main image. Upload only jpg, jpeg, png, gif or bmp images");
                main_image_check = false;
            }
            }//provjera je li slika unesena, provjera je li extension unutar naseg extensiona
            else{
                alert("Please upload the main image! Try again!");
                main_image_check = false;
            }

            if(alt_img.length > 0){
                if($.inArray(get_ext_alt_img[0].toLowerCase(), exts) >= -1){
                    alt_image_check = true;
                }
                else{
                alert("Error -> Alternate image. Upload only jpg, jpeg, png, gif or bmp images");
                alt_image_check = false;
            }
            }//provjera je li slika unesena, provjera je li extension unutar naseg extensiona
            else{
                alert("Please upload an alternate image! Try again!");
                alt_image_check = false;
            }

            if(main_image_check == true && alt_image_check == true){
                return true;
            }
            else{
                return false;
            }
        }

</script>


</body>
</html>