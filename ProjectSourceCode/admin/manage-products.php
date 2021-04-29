<?php
session_start();
include '../includes/config.php';
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Europe/London'); 
    $currentTime = date('d-m-Y h:i:s A', time());

    if (isset($_GET['del'])) {
        mysqli_query($con,"update products set status='inactive' where id = '".$_GET['id']."'");
        $_SESSION['delmsg']="Product deleted !!";
    }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Manage Products</title>
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
                                <h3>Manage Products</h3>
                            </div>
                            <div class="module-body table">
                                <?php if (isset($_GET['del'])) {?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Ops!</strong>
                                    <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                </div>
                                <?php }?>

                                <br />


                                <table cellpadding="0" cellspacing="0" border="0"
                                    class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Category </th>
                                            <th>Subcategory</th>
                                            <th>Company Name</th>
                                            <th>Product Creation Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $query = mysqli_query($con, "select products.*,category.categoryName,subcategory.subcategory from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory");
    $cnt = 1;
    while ($row = mysqli_fetch_array($query)) {
        ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($row['productName']); ?></td>
                                            <td><?php echo htmlentities($row['categoryName']); ?></td>
                                            <td> <?php echo htmlentities($row['subcategory']); ?></td>
                                            <td><?php echo htmlentities($row['productCompany']); ?></td>
                                            <td><?php echo htmlentities($row['postingDate']); ?></td>
                                            <td><?php echo htmlentities($row['status']); ?></td>
                                            <td>
                                                <a href="edit-products.php?id=<?php echo $row['id'] ?>"><i
                                                        class="icon-edit"></i></a>
                                                <a href="manage-products.php?id=<?php echo $row['id'] ?>&del=delete"
                                                    onClick="return confirm('Are you sure you want to delete?')"><i
                                                        class="icon-remove-sign"></i></a>
                                            </td>
                                        </tr>
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