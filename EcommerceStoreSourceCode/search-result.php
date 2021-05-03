<?php
session_start();
error_reporting(0);
include 'includes/config.php';
$find = "%{$_POST['product']}%";
// if (strlen($_SESSION['login']) == 0) {
//     header('location:login.php');
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Product Category</title>
	<?php include('includes/header-files-css.php');?>
</head>

<body class="cnt-home">

    <header class="header-style-1">

        <?php include 'includes/top-header.php';?>
        <?php include 'includes/main-header.php';?>
        <?php include 'includes/menu-bar.php';?>
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row outer-bottom-sm'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="side-menu animate-dropdown outer-bottom-xs">
                            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Sub Categories</div>
                            <nav class="yamm megamenu-horizontal" role="navigation">

                                <ul class="nav">
                                    <li class="dropdown menu-item">
                                        <?php $sql = mysqli_query($con, "select id,subcategory  from subcategory");

while ($row = mysqli_fetch_array($sql)) {
    ?>
                                        <a href="sub-category.php?scid=<?php echo $row['id']; ?>"
                                            class="dropdown-toggle"><i class="icon fa fa-desktop fa-fw"></i>
                                            <?php echo $row['subcategory']; ?></a>
                                        <?php }?>

                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div><!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <h3 class="section-title">shop by</h3>
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
                                <div class="widget-header m-t-20">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <?php $sql = mysqli_query($con, "select id,categoryName  from category");
while ($row = mysqli_fetch_array($sql)) {
    ?>
                                    <div class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="category.php?cid=<?php echo $row['id']; ?>"
                                                    class="accordion-toggle collapsed">
                                                    <?php echo $row['categoryName']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                        </div><!-- /.sidebar-filter -->
                    </div><!-- /.sidebar-module-container -->
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/banners/cat-banner-3.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text">
                                        <br />
                                    </div>
                                </div><!-- /.caption -->
                            </div><!-- /.container-fluid -->
                        </div>
                    </div>

                    <div class="search-result-container">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product  inner-top-vs">
                                    <div class="row">
                                        <?php
$ret = mysqli_query($con, "select * from products where productName like '$find'");
$num = mysqli_num_rows($ret);
if ($num > 0) {
    while ($row = mysqli_fetch_array($ret)) {?>
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
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
                                                                href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a>
                                                        </h3>
                                                        <div class="description"></div>

                                                        <div class="product-price">
                                                            <span class="price">
                                                            $ <?php echo htmlentities($row['productPrice']); ?>
                                                            </span>
                                                           

                                                        </div><!-- /.product-price -->

                                                    </div><!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">

                                                                    <?php if ($row['productAvailability'] == 'In Stock') {?>
                                                                    <a
                                                                        href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                        <button class="btn btn-primary"
                                                                            type="button">Buy</button></a>
                                                                    <?php } else {?>
                                                                    <div class="action" style="color:red">Out of Stock
                                                                    </div>
                                                                    <?php }?>

                                                                </li>


                                                            </ul>
                                                        </div><!-- /.action -->
                                                    </div><!-- /.cart -->
                                                </div>
                                            </div>
                                        </div>
                                        <?php }} else {?>

                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <h3>No Product Found</h3>
                                        </div>

                                        <?php }?>
                                    </div><!-- /.row -->
                                </div><!-- /.category-product -->
                            </div><!-- /.tab-pane -->
                        </div><!-- /.search-result-container -->
                    </div><!-- /.col -->
                </div>
            </div>
            <?php include 'includes/brands-slider.php';?>

        </div>
    </div>
    <?php include 'includes/footer.php';?>
    <?php include('includes/footer-files-script.php');?>

</body>

</html>