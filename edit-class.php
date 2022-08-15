<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <?php require_once('includes/header.php'); ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        <?php require_once('includes/navbar.php'); ?>

        <!-- Main Sidebar Container -->
        <?php require_once('includes/sidebar.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Class</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->    
            <?php require_once('includes/db.php'); ?>
            <?php
                if(isset($_GET['class_no'])) {
                    $class_no = $_GET['class_no'];
                    $qry = "SELECT * FROM class WHERE id = ? LIMIT 1";
                    $stmt = $con->prepare($qry);
                    $stmt->execute(array($class_no));
                    $row = $stmt->fetch();
                    $num = $stmt->rowCount();
                    if($num == 0)
                        header('Location: classes.php');
                }
                
             ?>    
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-body">
                            <form method="post" action="update-class.php">
                                <div class="form-group col-md-6">
                                    <label for="class_name">Class Name</label>
                                    <input type="text" class="form-control" name="class_name" id="class_name" value="<?php echo $row['name']; ?>" placeholder="Class Name" required>
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                                </div>
                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <?php require_once('includes/footer.php'); ?>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <?php require_once('includes/partials/scripts.php'); ?>
        <script src="public/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="public/assets/plugins/jquery-validation/additional-methods.min.js"></script>
        <?php require_once('includes/partials/_student_validations.php'); ?>
    </body>
</html>
