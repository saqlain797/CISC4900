<?php
session_start();
error_reporting(0);
include 'includes/config.php';
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $contactno = $_POST['contactno'];
        $query = mysqli_query($con, "update users set user_name='$name',user_phone='$contactno' where Id='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Your info has been updated');</script>";
        }
    }

    date_default_timezone_set('Europe/London'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con, "SELECT user_password FROM  users where user_password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            // $con=mysqli_query($con,"update students set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
            echo "<script>alert('Password Changed Successfully !!');</script>";
        } else {
            echo "<script>alert('Current Password not match !!');</script>";
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
    <title>My Account</title>
	<?php include('includes/header-files-css.php');?>
    <script type="text/javascript">
    function valid() {
        if (document.chngpwd.cpass.value == "") {
            alert("Current Password Filed is Empty !!");
            document.chngpwd.cpass.focus();
            return false;
        } else if (document.chngpwd.newpass.value == "") {
            alert("New Password Filed is Empty !!");
            document.chngpwd.newpass.focus();
            return false;
        } else if (document.chngpwd.cnfpass.value == "") {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.cnfpass.focus();
            return false;
        } else if (document.chngpwd.newpass.value != document.chngpwd.cnfpass.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.cnfpass.focus();
            return false;
        }
        return true;
    }
    </script>

</head>

<body class="cnt-home">
    <header class="header-style-1">
        <?php include 'includes/top-header.php';?>
        <?php include 'includes/main-header.php';?>
        <?php include 'includes/menu-bar.php';?>
    </header>
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="checkout-box inner-bottom-sm">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            <span>1</span>My Profile
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <h4>Personal info</h4>
                                            <div class="col-md-12 col-sm-12 already-registered-login">
												<?php $query = mysqli_query($con, "select * from users where Id='" . $_SESSION['id'] . "'");
												    while ($row = mysqli_fetch_array($query)) { ?>
                                                <form class="register-form" role="form" method="post">
                                                    <div class="form-group">
                                                        <label class="info-title" for="name">Name<span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            value="<?php echo $row['user_name']; ?>" id="name"
                                                            name="name" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email Address
                                                            <span>*</span></label>
                                                        <input type="email"
                                                            class="form-control unicase-form-control text-input"
                                                            id="exampleInputEmail1"
                                                            value="<?php echo $row['user_email']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="info-title" for="Contact No.">Contact No.
                                                            <span>*</span></label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="contactno" name="contactno" required="required"
                                                            value="<?php echo $row['user_phone']; ?>" maxlength="10">
                                                    </div>
                                                    <button type="submit" name="update"
                                                        class="btn-upper btn btn-primary checkout-page-button">Update</button>
                                                </form>
                                                <?php }?>
                                            </div>
                                            <!-- already-registered-login -->
                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                            <!-- checkout-step-02  -->
                            <div class="panel panel-default checkout-step-02">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                            href="#collapseTwo">
                                            <span>2</span>Change Password
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <form class="register-form" role="form" method="post" name="chngpwd"
                                            onSubmit="return valid();">
                                            <div class="form-group">
                                                <label class="info-title" for="Current Password">Current
                                                    Password<span>*</span></label>
                                                <input type="password"
                                                    class="form-control unicase-form-control text-input" id="cpass"
                                                    name="cpass" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="New Password">New Password
                                                    <span>*</span></label>
                                                <input type="password"
                                                    class="form-control unicase-form-control text-input" id="newpass"
                                                    name="newpass">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="Confirm Password">Confirm Password
                                                    <span>*</span></label>
                                                <input type="password"
                                                    class="form-control unicase-form-control text-input" id="cnfpass"
                                                    name="cnfpass" required="required">
                                            </div>
                                            <button type="submit" name="submit"
                                                class="btn-upper btn btn-primary checkout-page-button">Change </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- checkout-step-02  -->
                        </div><!-- /.checkout-steps -->
                    </div>
                    <?php include 'includes/myaccount-sidebar.php';?>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <?php include 'includes/brands-slider.php';?>

        </div>
    </div>
    <?php include 'includes/footer.php';?>
	<?php include('includes/footer-files-script.php');?>

</body>

</html>
<?php }?>