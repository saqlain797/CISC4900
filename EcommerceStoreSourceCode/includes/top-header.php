
<div class="top-bar animate-dropdown">
    <div class="container">
        <div class="header-top-inner">
            <div class="cnt-account">
                <ul class="list-unstyled">

                    <?php if (strlen($_SESSION['login'])) {?>
                    <li><a href="#"><i class="icon fa fa-user"></i>Welcome
                            -<?php echo htmlentities($_SESSION['username']); ?></a></li>
                            <li><a href="addproduct.php"><i class="icon fa fa-user"></i>Add Product</a></li>
                    <?php }?>
                    <li><a href="my-account.php"><i class="icon fa fa-user"></i>My Account</a></li>
                    <li><a href="my-wishlist.php"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                    <li><a href="about-us.php"><i class="icon fa "></i>About Us</a></li>
                    <li><a href="who-we-are.php"><i class="icon fa "></i>Who We Are</a></li>
                    <li><a href="contact-us.php"><i class="icon fa fa-address"></i>Contact Us</a></li>
                    <?php if (strlen($_SESSION['login']) == 0) {?>
                    <li><a href="login.php"><i class="icon fa fa-sign-in"></i>Login</a></li>
                    <?php } else {?>
                    <li><a href="logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
                    <?php }?>
                </ul>
            </div>
            <div class="cnt-block">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small">
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>