<?php
session_start();
error_reporting(0);
include 'includes/config.php';

$pid = intval($_GET['pid']);
$userID="";

if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {
        header('location:login.php');
    }
else
{
    mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
    echo "<script>alert('Product aaded in wishlist');</script>";
    header('location:my-wishlist.php');

}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Product Details</title>
    <?php include('includes/header-files-css.php');?>
</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include 'includes/top-header.php';?>
        <?php include 'includes/main-header.php';?>
        <?php include 'includes/menu-bar.php';?>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <?php $ret = mysqli_query($con, "select category.categoryName as catname,subCategory.subcategory as subcatname,products.productName as pname from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
                while ($rw = mysqli_fetch_array($ret)) { ?>
                <ul class="list-inline list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><?php echo htmlentities($rw['catname']); ?></a></li>
                    <li><?php echo htmlentities($rw['subcatname']); ?></li>
                    <li class='active'><?php echo htmlentities($rw['pname']); ?></li>
                </ul>
                <?php }?>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product outer-bottom-sm '>
                <div class='col-md-3 sidebar'>

                    
                    <div class="sidebar-module-container">
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">
                                    <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                                    while ($row = mysqli_fetch_array($sql)) { ?>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="category.php?cid=<?php echo $row['id']; ?>"
                                                class="accordion-toggle collapsed">
                                                <?php echo $row['categoryName']; ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.sidebar -->
                <?php
$ret = mysqli_query($con, "select * from products where id='$pid'");
while ($row = mysqli_fetch_array($ret)) {
    ?>
                <div class='col-md-9'>
                    <div class="row  wow fadeInUp">
                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">

                                    <div class="single-product-gallery-item" id="slide1">
                                        <a data-lightbox="image-1"
                                            data-title="<?php echo htmlentities($row['productName']); ?>"
                                            href="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                            <img class="img-responsive" alt="" src="admin/assets/images/blank.gif"
                                                data-echo="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width="370" height="350" />
                                        </a>
                                    </div>

                                    <div class="single-product-gallery-item" id="slide1">
                                        <a data-lightbox="image-1"
                                            data-title="<?php echo htmlentities($row['productName']); ?>"
                                            href="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>">
                                            <img class="img-responsive" alt="" src="admin/assets/images/blank.gif"
                                                data-echo="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>"
                                                width="370" height="350" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->

                                    <div class="single-product-gallery-item" id="slide2">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>">
                                            <img class="img-responsive" alt="" src="admin/assets/images/blank.gif"
                                                data-echo="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->

                                    <div class="single-product-gallery-item" id="slide3">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>">
                                            <img class="img-responsive" alt="" src="admin/assets/images/blank.gif"
                                                data-echo="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" />
                                        </a>
                                    </div>

                                </div><!-- /.single-product-slider -->


                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                data-slide="1" href="#slide1">
                                                <img class="img-responsive" alt="" src="admin/assets/images/blank.gif"
                                                    data-echo="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" />
                                            </a>
                                        </div>

                                        <div class="item">
                                            <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2"
                                                href="#slide2">
                                                <img class="img-responsive" width="85" alt=""
                                                    src="assets/images/blank.gif"
                                                    data-echo="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" />
                                            </a>
                                        </div>
                                        <div class="item">

                                            <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3"
                                                href="#slide3">
                                                <img class="img-responsive" width="85" alt=""
                                                    src="admin/assets/images/blank.gif"
                                                    data-echo="productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>"
                                                    height="200" />
                                            </a>
                                        </div>
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name"><?php echo htmlentities($row['productName']); ?></h1>
                                <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pid'");
    $num = mysqli_num_rows($rt);
    {
        ?>
                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(<?php echo htmlentities($num); ?> Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->
                                <?php }?>
                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span
                                                    class="value"><?php echo htmlentities($row['productAvailability']); ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>
                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="stock-box">
                                                <span class="label">Product Brand :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span
                                                    class="value"><?php echo htmlentities($row['productCompany']); ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="stock-box">
                                                <span class="label">Shipping Charge :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value"><?php if ($row['shippingCharge'] == 0) {
        echo "Free";
    } else {
        echo htmlentities($row['shippingCharge']);
    }

    ?></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div>

                                <div class="price-container info-container m-t-20">
                                    <div class="row">


                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                <span class="price">$
                                                    <?php echo htmlentities($row['productPrice']); ?></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <div class="col-sm-6">
                                    <div class="favorite-button m-t-10">
                                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                            title="Wishlist"
                                            href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
                                            <i class="fa fa-heart"></i>
                                        </a>

                                        </a>
                                    </div>
                                </div>

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-7">
                                            <?php if ($row['productAvailability'] == 'In Stock') {?>
                                            
                                                <a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
							<button class="btn btn-primary" type="button">Add to cart</button></a>
                                            <?php } else {?>
                                            <div class="action" style="color:red">Out of Stock</div>
                                            <?php }?>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->

                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">

                            <div class="col-sm-9">
                                <h2>Product Detail</h2>
                                <div class="tab-content">
                                    <div id="description" class="tab-pane in active">
                                        <?php
$ret = mysqli_query($con, "select * from products where id='$pid'");
while ($row = mysqli_fetch_array($ret)) {
    ?>
                                        <p><?php echo $row['productDescription']; ?></p>
                                        <?php } ?>
                                    </div><!-- /.form-container -->
                                </div><!-- /.product-add-review -->
                            </div><!-- /.product-tab -->


                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                    <?php 
                    $ret1 = mysqli_query($con, "select * from products where id='$pid'");
                    while ($row1 = mysqli_fetch_array($ret1)) {
                    
                    if (!is_null($row1['sale_status'])) {?>

                        <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                            <div class="row">

                                <div class="col-sm-9">
                                    <h2>Product Sold Out Remarks</h2>
                                    <div class="tab-content">
                                        <div id="description" class="tab-pane in active">

                                            <p><?php echo $row1['sale_status']; ?></p>

                                        </div><!-- /.form-container -->
                                    </div><!-- /.product-add-review -->
                                </div><!-- /.product-tab -->
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->

                    <?php } }?>





                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.product-tabs -->

        <?php $cid = $row['category'];
        $subcid = $row['subCategory'];}?>

    </div><!-- /.col -->
    <div class="clearfix"></div>
    </div>
    <?php include 'includes/brands-slider.php';?>
    </div>
    </div>
    <?php include 'includes/footer.php';?>
    <?php include('includes/footer-files-script.php');?>

</body>

</html>