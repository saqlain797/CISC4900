<?php
session_start();
include '../includes/config.php';
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('US/Eastern'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from users where Id = '" . $_GET['uid'] . "'");
        $_SESSION['delmsg'] = "User deleted !!";
    }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Manage Users</title>
    <?php include 'include/header-files.php';?>
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
                                <h3>Manage Users</h3>
                            </div>
                            <div class="module-body table">
                                <?php if (isset($_GET['del'])) {?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                </div>
                                <?php }?>

                                <br />


                                <table cellpadding="0" cellspacing="0" border="0"
                                    class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> Name</th>
                                            <th>Email </th>
                                            <th>Contact no</th>
                                            <th>Reg. Date </th>
                                            <th>User Type </th>
                                            <th>Action </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $query = mysqli_query($con, "select * from users");
    $cnt = 1;
    while ($row = mysqli_fetch_array($query)) {
        ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($row['user_name']); ?></td>
                                            <td><?php echo htmlentities($row['user_email']); ?></td>
                                            <td> <?php echo htmlentities($row['user_phone']); ?></td>
                                            <td><?php echo htmlentities($row['reg_date']); ?> </td>
                                            <td><?php echo htmlentities($row['user_type']); ?> </td>
                                            <td><a href="edit-users.php?uid=<?php echo $row['Id'] ?>"><i
                                                        class="icon-edit"></i></a>
                                            </td>
                                            <?php $cnt = $cnt + 1;}?>
                                </table>
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