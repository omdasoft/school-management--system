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
                        <h1 class="m-0 text-dark">Add Result</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php require_once('includes/db.php'); ?>
            <?php 
                if(isset($_GET['stud_no'])) {
                    $stud_no = $_GET['stud_no'];
                    $sql = "SELECT * FROM students WHERE stud_no = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->execute(array($stud_no));
                    $student = $stmt->fetch();
                    $sql = "SELECT * FROM class WHERE id = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->execute(array($student['class_id']));
                    $class = $stmt->fetch();
                    $class_id = $class['id'];
                    $sql = "SELECT cl_sub.*, sub.* FROM class_subjects AS cl_sub JOIN subjects AS sub ON sub.id = cl_sub.subject_id AND cl_sub.class_id = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->execute(array($class_id));
                    $subjects = $stmt->fetchAll();
                    $count = $stmt->rowCount();
                    //var_dump($subjects);exit;
                    if($count == 0){
                        $message = "please add subjects to this class first";
                        header('location:classes.php?message='.$message);
                    }
                    
                }
            ?>        
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-header">
                            <div class="card-title">
                                <?php echo $student['stud_name']; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="insert-result.php">
                                <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                <input type = "hidden" name="stud_no" value="<?php echo $stud_no; ?>">
                                <div class="form-group">
                                    <div class="form-row">
                                        <?php foreach($subjects as $key => $subject){ ?>
                                            <div class="col-md-4">
                                                <label for="subject_id"><?php echo $subject['name']; ?></label>
                                                <input type="hidden" class="form-control" name="subject[<?php echo $key; ?>][id]" id="subject_id" value="<?php echo $subject['id']; ?>">
                                                <input type="text" class="form-control" name="subject[<?php echo $key; ?>][mark]" id="mark" placeholder="enter mark">
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success">Create</button>
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
