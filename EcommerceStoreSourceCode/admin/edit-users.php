<?php
session_start();
include '../includes/config.php';
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $uid = intval($_GET['uid']);
    if (isset($_POST['submit'])) {
        $username = $_POST['userName'];
        $universityname = $_POST['universityName'];
        $usertype = $_POST['userType'];

        $sql = mysqli_query($con, "update users set user_name='$username',university_name='$universityname',user_type='$usertype' where id='$uid' ");
        $_SESSION['msg'] = "User Updated Successfully !!";

    }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Update User</title>
    <?php include 'include/header-files.php';?>

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

<body>
    <?php include 'include/header.php';?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include 'include/sidebar.php';?>
                <div class="span9">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Insert Product</h3>
                            </div>
                            <div class="module-body">

                                <?php if (isset($_POST['submit'])) {?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Well done!</strong>
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

                                    <?php

    $query = mysqli_query($con, "select * from users  where Id='$uid'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($query)) {

        ?>

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">User Name</label>
                                        <div class="controls">
                                            <input type="text" name="userName" placeholder="Enter User Name"
                                                value="<?php echo htmlentities($row['user_name']); ?>"
                                                class="span8 tip">
                                        </div>
                                    </div>

                                    
                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">User Type</label>
                                        <div class="controls">
                                            <select name="userType" id="userType"
                                                class="span8 tip" required>
                                                <option value="<?php echo htmlentities($row['user_type']); ?>">
                                                    <?php echo htmlentities($row['user_type']); ?></option>
                                                <option value="student">user</option>
                                                <option value="blocked">blocked</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

    <?php include 'include/footer.php';?>
    <?php include 'include/footer-files.php';?>
</body>
<?php }?>