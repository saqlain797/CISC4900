<?php
session_start();
include '../includes/config.php';
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $category = $_POST['category'];
        $subcat = $_POST['subcategory'];
        $sql = mysqli_query($con, "insert into subcategory(categoryid,subcategory) values('$category','$subcat')");
        $_SESSION['msg'] = "SubCategory Created !!";

    }

    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from subcategory where id = '" . $_GET['id'] . "'");
        $_SESSION['delmsg'] = "SubCategory deleted !!";
    }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| SubCategory</title>
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
                                <h3>Sub Category</h3>
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

                                <form class="form-horizontal row-fluid" name="subcategory" method="post">

                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">Category</label>
                                        <div class="controls">
                                            <select name="category" class="span8 tip" required>
                                                <option value="">Select Category</option>
                                                <?php $query = mysqli_query($con, "select * from category");
    while ($row = mysqli_fetch_array($query)) {?>

                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['categoryName']; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label class="control-label" for="basicinput">SubCategory Name</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Enter SubCategory Name" name="subcategory"
                                                class="span8 tip" required>
                                        </div>
                                    </div>



                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="submit" class="btn">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="module">
                            <div class="module-head">
                                <h3>Sub Category</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0"
                                    class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $query = mysqli_query($con, "select subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate from subcategory join category on category.id=subcategory.categoryid");
    $cnt = 1;
    while ($row = mysqli_fetch_array($query)) {
        ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt); ?></td>
                                            <td><?php echo htmlentities($row['categoryName']); ?></td>
                                            <td><?php echo htmlentities($row['subcategory']); ?></td>
                                            <td> <?php echo htmlentities($row['creationDate']); ?></td>
                                            <td><?php echo htmlentities($row['updationDate']); ?></td>
                                            <td>
                                                <a href="edit-subcategory.php?id=<?php echo $row['id'] ?>"><i
                                                        class="icon-edit"></i></a>
                                                <a href="subcategory.php?id=<?php echo $row['id'] ?>&del=delete"
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