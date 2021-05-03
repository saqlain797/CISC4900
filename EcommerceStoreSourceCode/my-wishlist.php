<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
// Code forProduct deletion from  wishlist
    $wid = intval($_GET['del']);
    if (isset($_GET['del'])) {
        $query = mysqli_query($con, "delete from wishlist where id='$wid'");
    }

    if (isset($_GET['action']) && $_GET['action'] == "add") {
        $id = intval($_GET['id']);
        $query = mysqli_query($con, "delete from wishlist where productId='$id'");
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $sql_p = "SELECT * FROM products WHERE id={$id}";
            $query_p = mysqli_query($con, $sql_p);
            if (mysqli_num_rows($query_p) != 0) {
                $row_p = mysqli_fetch_array($query_p);
                $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
                header('location:my-wishlist.php');
            } else {
                $message = "Product ID is invalid";
            }
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>My Wishlist</title>
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
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Wishlish</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="my-wishlist-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="4">my wishlist</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$ret = mysqli_query($con, "select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='" . $_SESSION['id'] . "'");
    $num = mysqli_num_rows($ret);
    if ($num > 0) {
        while ($row = mysqli_fetch_array($ret)) {
            ?>
                                    <tr>
                                        <td class="col-md-2"><img
                                                src="productimages/<?php echo htmlentities($row['pid']); ?>/<?php echo htmlentities($row['pimage']); ?>"
                                                alt="<?php echo htmlentities($row['pname']); ?>" width="60"
                                                height="100"></td>
                                        <td class="col-md-6">
                                            <div class="product-name"><a
                                                    href="product-details.php?pid=<?php echo htmlentities($pd = $row['pid']); ?>"><?php echo htmlentities($row['pname']); ?></a>
                                            </div>
                                            <div class="price">$
                                                <?php echo htmlentities($row['pprice']); ?>.00
                                                
                                            </div>
                                        </td>
                                        
                                        <td class="col-md-2 close-btn">
                                            <a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']); ?>"
                                                onClick="return confirm('Are you sure you want to delete?')" class=""><i
                                                    class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php }} else {?>
                                    <tr>
                                        <td style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            
        </div>
    </div>
    <?php include 'includes/footer.php';?>
    <?php include('includes/footer-files-script.php');?>
    
</body>

</html>
<?php }?>