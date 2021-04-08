<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Ecommerce Store</title>
    <?php include('includes/header-files-css.php');?>
</head>
<body >
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>
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
                                    <div class="item" style="background-image: url(assets/images/sliders/slider-1.jpg);">
                                    </div>
                                </div>
                                <div class="full-width-slider">
                                    <div class="item full-width-slider"
                                        style="background-image: url(assets/images/sliders/slider-2.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- === SCROLL TABS == -->
                <div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
                    <div class="more-info-tab clearfix">
                        <h3 class="new-product-title pull-left">Featured Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                            <li><a href="#electronics" data-toggle="tab">Electronics</a></li>
                            <li><a href="#firstaid" data-toggle="tab">First Aid</a></li>
                        </ul><!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    <?php
						$ret=mysqli_query($con,"select * from products where status='active'");
						while ($row=mysqli_fetch_array($ret)) 
						{
						?>
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                                            <img src="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                data-echo="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                width="180" height="300" alt=""></a>
                                                    </div><!-- /.image -->
                                                </div><!-- /.product-image -->
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                        $<?php echo htmlentities($row['productPrice']);?></span>
                                                        <span
                                                            class="price-before-discount">$<?php echo htmlentities($row['productPrice']);?>
                                                        </span>
                                                    </div><!-- /.product-price -->
                                                </div><!-- /.product-info -->
                                                <?php if($row['productAvailability']=='In Stock'){?>
                                                <div class="action"><a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                                        class="lnk btn btn-primary">Buy</a></div>
                                                <?php } else {?>
                                                <div class="action" style="color:red">Out of Stock</div>
                                                <?php } ?>
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php } ?>

                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>

<br><br>
<div class="tab-pane" id="electronics">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?php
$ret=mysqli_query($con,"select * from products where category=4 and status='active'");
while ($row=mysqli_fetch_array($ret)) 
{
	


?>


                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                    <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                                            <img src="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                data-echo="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                width="180" height="300" alt=""></a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                        $<?php echo htmlentities($row['productPrice']);?></span>
                                                        <span
                                                            class="price-before-discount">$<?php echo htmlentities($row['productPrice']);?>
                                                        </span>
                                                    </div><!-- /.product-price -->
                                                </div><!-- /.product-info -->
                                                <?php if($row['productAvailability']=='In Stock'){?>
                                                <div class="action"><a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                                        class="lnk btn btn-primary">Buy</a></div>
                                                <?php } else {?>
                                                <div class="action" style="color:red">Out of Stock</div>
                                                <?php } ?>
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php } ?>


                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>



                        <div class="tab-pane" id="firstaid">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                    <?php
$ret=mysqli_query($con,"select * from products where category=7 and status='active'");
while ($row=mysqli_fetch_array($ret)) 
{
?>
                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                    <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
                                                            <img src="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                data-echo="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                width="180" height="300" alt=""></a>
                                                    </div><!-- /.image -->


                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                        $<?php echo htmlentities($row['productPrice']);?></span>
                                                        <span
                                                            class="price-before-discount">$<?php echo htmlentities($row['productPrice']);?>
                                                        </span>
                                                    </div><!-- /.product-price -->
                                                </div><!-- /.product-info -->
                                                <?php if($row['productAvailability']=='In Stock'){?>
                                                <div class="action"><a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                                        class="lnk btn btn-primary">Buy</a></div>
                                                <?php } else {?>
                                                <div class="action" style="color:red">Out of Stock</div>
                                                <?php } ?>
                                            </div><!-- /.product -->

                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php } ?>


                                </div><!-- /.home-owl-carousel -->
                            </div><!-- /.product-slider -->
                        </div>


                        <div class="sections prod-slider-small outer-top-small">
                    <div class="row">
                        <div class="col-md-6">
                            <section class="section">
                                <h3 class="section-title">Chargers</h3>
                                <div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme"
                                    data-item="2">

                                    <?php
$ret=mysqli_query($con,"select * from products where category=4 and subCategory=2 and status='active'");
while ($row=mysqli_fetch_array($ret)) 
{
?>
                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img
                                                                src="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                data-echo="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                width="180" height="300"></a>
                                                    </div><!-- /.image -->
                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                                                    </h3>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                        $<?php echo htmlentities($row['productPrice']);?></span>
                                                        <span
                                                            class="price-before-discount">$<?php echo htmlentities($row['productPrice']);?>
                                                        </span>
                                                    </div><!-- /.product-price -->
                                                </div><!-- /.product-info -->
                                                <?php if($row['productAvailability']=='In Stock'){?>
                                                <div class="action"><a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                                        class="lnk btn btn-primary">Buy</a></div>
                                                <?php } else {?>
                                                <div class="action" style="color:red">Out of Stock</div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>


                                </div>
                            </section>
                        </div>
                        <div class="col-md-6">
                            <section class="section">
                                <h3 class="section-title">Power Banks</h3>
                                <div class="owl-carousel homepage-owl-carousel custom-carousel outer-top-xs owl-theme"
                                    data-item="2">
                                    <?php
$ret=mysqli_query($con,"select * from products where category=4 and subCategory=3 and status='active'");
while ($row=mysqli_fetch_array($ret)) 
{
?>



                                    <div class="item item-carousel">
                                        <div class="products">

                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img
                                                                src="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                data-echo="productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"
                                                                width="180" height="300"></a>
                                                    </div><!-- /.image -->
                                                </div><!-- /.product-image -->


                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a>
                                                    </h3>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <span class="price">
                                                        $<?php echo htmlentities($row['productPrice']);?></span>
                                                        <span
                                                            class="price-before-discount">$<?php echo htmlentities($row['productPrice']);?>
                                                        </span>
                                                    </div><!-- /.product-price -->
                                                </div><!-- /.product-info -->
                                                <?php if($row['productAvailability']=='In Stock'){?>
                                                <div class="action"><a
                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"
                                                        class="lnk btn btn-primary">Buy</a></div>
                                                <?php } else {?>
                                                <div class="action" style="color:red">Out of Stock</div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>



                                </div>
                            </section>

                        </div>
                    </div>
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