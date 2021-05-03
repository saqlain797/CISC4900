<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration
if(isset($_POST['submit']))
{
	$name=$_POST['fullname'];
	$email=$_POST['emailid'];
	$contactno=$_POST['contactno'];
	$password=md5($_POST['password']);
	$uniname=$_POST['uniname'];
	$usertype='user';
	$query=mysqli_query($con,"insert into users(user_name,user_password,user_email,user_phone, user_type) values('$name','$password','$email','$contactno','$usertype')");
	if($query)
	{
		echo "<script>alert('You are successfully register');</script>";
	}
	else{
		echo "<script>alert('Not register something went worng');</script>";
	}
}
// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=md5($_POST['login_password']);
	$query=mysqli_query($con,"SELECT * FROM users WHERE user_email='$email' and user_password='$password' and user_type='user'");
	$num=mysqli_fetch_array($query);
	if($num>0)
	{
		$extra="index.php";
		$_SESSION['login']=$_POST['email'];
		$_SESSION['id']=$num['Id'];
		$_SESSION['username']=$num['user_name'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$status=1;
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
	else
	{
		$extra="login.php";
		$email=$_POST['email'];
		$uip=$_SERVER['REMOTE_ADDR'];
		$status=0;
		// $log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		$_SESSION['errmsg']="Invalid email id or Password";
		exit();
	}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>E Commerce | Signi-in | Signup</title>
    <?php include('includes/header-files-css.php');?>
    <script type="text/javascript">
    function valid() {
        if (document.register.password.value != document.register.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.register.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
    <script>
    function userAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
</head>
<body class="cnt-home">
    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Authentication</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="sign-in-page inner-bottom-sm">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <form class="register-form outer-top-xs" method="post">
                            <span style="color:red;">
                                <?php echo htmlentities($_SESSION['errmsg']);?>
                                <?php echo htmlentities($_SESSION['errmsg']="");?>
                            </span>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" name="login_password"
                                    class="form-control unicase-form-control text-input" id="exampleInputPassword1">
                            </div>
                            <div class="radio outer-xs">
                                <a href="forgot-password.php" class="forgot-password pull-right">Forgot your
                                    Password?</a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button"
                                name="login">Login</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">create a new account</h4>
                        <p class="text title-tag-line">Create your own Shopping account.</p>
                        <form class="register-form outer-top-xs" role="form" method="post" name="register"
                            onSubmit="return valid();">
                            <div class="form-group">
                                <label class="info-title" for="fullname">Full Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="fullname"
                                    name="fullname" required="required">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" id="email"
                                    onBlur="userAvailability()" name="emailid" required>
                                <span id="user-availability-status1" style="font-size:12px;"></span>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="contactno">Contact No. <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="contactno"
                                    name="contactno" maxlength="10" required>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">Password. <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="password" name="password" required>
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input"
                                    id="confirmpassword" name="confirmpassword" required>
                            </div>
                            <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button"
                                id="submit">Sign Up</button>
                        </form>
                        <span class="checkout-subtitle outer-top-xs">Sign Up Today And You'll Be Able To : </span>
                        <div class="checkbox">
                            <label class="checkbox">
                                Speed your way through the buy and sell.
                            </label>
                            <label class="checkbox">
                                Sale any item/ products that own.
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php');?>
	<?php include('includes/footer-files-script.php');?>
</body>

</html>