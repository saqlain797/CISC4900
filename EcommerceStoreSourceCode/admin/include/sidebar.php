<div class="span3">
    <div class="sidebar">


        <ul class="widget widget-menu unstyled">
           
            <li>
                <a href="manage-users.php">
                    <i class="menu-icon icon-group"></i>
                    Manage users
                </a>
            </li>
        </ul>


        <ul class="widget widget-menu unstyled">
            <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Create Category </a></li>
            <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Sub Category </a></li>
            <li><a href="manage-products.php"><i class="menu-icon icon-table"></i>Manage Products </a></li>
            <li><a href="addproduct.php"><i class="menu-icon icon-paste"></i>Insert Product </a></li>
            <li>
                        <a href="delivered-orders.php">
                            <i class="icon-inbox"></i>
                            Delivered Orders
                            <?php
$status = 'Delivered';
$rt = mysqli_query($con, "SELECT * FROM Orders where orderStatus='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
                            <?php }?>

                        </a>
                    </li>
                    <li>
                        <a href="pending-orders.php">
                            <i class="icon-tasks"></i>
                            Pending Orders
                            <?php
$status = 'Delivered';
$ret = mysqli_query($con, "SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
$num = mysqli_num_rows($ret);
{?><b class="label orange pull-right"><?php echo htmlentities($num); ?></b>
                            <?php }?>
                        </a>
                    </li>


        </ul>
        <!--/.widget-nav-->

        <ul class="widget widget-menu unstyled">

            <li>
                <a href="logout.php">
                    <i class="menu-icon icon-signout"></i>
                    Logout
                </a>
            </li>
        </ul>

    </div>
    <!--/.sidebar-->
</div>
<!--/.span3-->