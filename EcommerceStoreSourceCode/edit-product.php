<?php
	session_start();
	error_reporting(0);
    include('includes/config.php');
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        $pid=intval($_GET['pid']);
        if (isset($_POST['submit'])) {
            
            $productname = $_POST['productName'];
            $productcompany = $_POST['productCompany'];
            $productprice = $_POST['productprice'];
            $productdescription = $_POST['productDescription'];
            $category = $_POST['category'];
            $subcat = $_POST['subcategory'];
            $productavailability = $_POST['productAvailability'];
            $soldout=$_POST['soldout'];

            $sql = mysqli_query($con, "update products set productName='$productname',productCompany='$productcompany',productPrice='$productprice',productDescription='$productdescription',category='$category',subCategory='$subcat',productAvailability='$productavailability', sale_status='$soldout' where id='$pid'");
        $_SESSION['msg'] = "Product Inserted Successfully !!";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>E Commerce</title>
    <?php include('includes/header-files-css.php');?>
    <script>
    function getSubcat(val) {
        $.ajax({
            type: "POST",
            url: "get_subcat.php",
            data: 'cat_id=' + val,
            success: function(data) {
                $("#subcategory").html(data);
            }
        });
    }

    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
    </script>
</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>
    <section>
        <div class="body-content outer-top-xs" id="top-banner-and-menu">
            <div class="container">
                <div class="furniture-container homepage-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                            <?php include('includes/side-menu.php');?>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                            <div id="hero" class="homepage-slider3">
                                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                                    <div class="full-width-slider">
                                        <div class="item"
                                            style="background-image: url(assets/images/sliders/1.jpg);">
                                        </div>
                                    </div>
                                    <div class="full-width-slider">
                                        <div class="item full-width-slider"
                                            style="background-image: url(assets/images/sliders/1.jpg);">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- === SCROLL TABS == -->
                    <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
                        <div class="more-info-tab clearfix">
                            <h3 class="new-product-title pull-left">Edit Product</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                                
                            </ul><!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">

                        <?php if (isset($_POST['submit'])) {?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                </div>
                                <?php }?>


                                <?php if (isset($_GET['del'])) {?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                </div>
                                <?php }?>

                                <br />

                            <form class="form-horizontal row-fluid" name="insertproduct" method="post"
                                enctype="multipart/form-data">

                               <?php $query=mysqli_query($con,"select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
    ?>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Category</label>
                                    <div class="controls">
                                    
                                        <select name="category" class="form-control" onChange="getSubcat(this.value);"
                                            required>
                                            <option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['catname']);?></option> 
                                            <?php $query1=mysqli_query($con,"select * from category");
                                            while($rw=mysqli_fetch_array($query1)){
                                                	if($row['catname']==$rw['categoryName'])
                                                    	{
                                                        	continue;
                                                        }else{?>
                                                        <option value="<?php echo $rw['id'];?>"><?php echo $rw['categoryName'];?></option>
                                                        <?php }} ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Sub Category</label>
                                    <div class="controls">
                                        <select name="subcategory" id="subcategory" class="form-control" required>
                                        <option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcatname']);?>
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Name</label>
                                    <div class="controls">
                                        <input type="text" name="productName" placeholder="Enter Product Name" value="<?php echo htmlentities($row['productName']);?>"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Company</label>
                                    <div class="controls">
                                        <input type="text" name="productCompany"
                                            placeholder="Enter Product Comapny Name" class="form-control" value="<?php echo htmlentities($row['productCompany']);?>" required>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Price After Discount(Selling
                                        Price)</label>
                                    <div class="controls">
                                        <input type="text" name="productprice" placeholder="Enter Product Price" value="<?php echo htmlentities($row['productPrice']);?>"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Description</label>
                                    <div class="controls">
                                        <textarea name="productDescription" placeholder="Enter Product Description" 
                                            rows="6" class="form-control">
                                            <?php echo htmlentities($row['productDescription']);?>
                                        </textarea>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Availability</label>
                                    <div class="controls">
                                        <select name="productAvailability" id="productAvailability" class="form-control"
                                            required>
                                            <option value="<?php echo htmlentities($row['productAvailability']);?>"><?php echo htmlentities($row['productAvailability']);?></option>
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Image1</label>
                                    <div class="controls">
                                    <img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage1']);?>" width="200" height="100"> <a href="update-image1.php?id=<?php echo $row['id'];?>">Change Image</a>
                                    
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Image2</label>
                                    <div class="controls">
                                    <img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage2']);?>" width="200" height="100"> <a href="update-image2.php?id=<?php echo $row['id'];?>">Change Image</a>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Product Image3</label>
                                    <div class="controls">
                                    <img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage3']);?>" width="200" height="100"> <a href="update-image3.php?id=<?php echo $row['id'];?>">Change Image</a>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Sold Out Comments</label>
                                    <div class="controls">
                                        <textarea name="soldout" placeholder="Product Sold Out Comments" 
                                            rows="6" class="form-control">
                                            
                                        </textarea>
                                    </div>
                                </div>

                                <?php } ?>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="submit" class="btn btn-outline-primary">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
    </section>
    <?php include('includes/brands-slider.php');?>
    </div>
    </div>
    <?php include('includes/footer.php');?>
    <?php include('includes/footer-files-script.php');?>
</body>

</html>