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
                        <h1 class="m-0 text-dark">Add Subject to Class</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->     
            <?php require_once('includes/db.php'); ?>
            <?php
               $sql = "SELECT * FROM class order by id desc";
               $stmt = $con->prepare($sql);
               $stmt->execute();
               $classes = $stmt->fetchALL();
               $class_count = $stmt->rowCount();

               $sql = "SELECT * FROM subjects order by id desc";
               $stmt = $con->prepare($sql);
               $stmt->execute();
               $subjects = $stmt->fetchAll();
               $subjects_count = $stmt->rowCount();
             ?>   
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-body">
                            <form method="post" action="insert-class-subjects.php">
                                <div class="form-group col-md-6">
                                    <label for="subject_name">Select Class</label>
                                    <?php if($class_count > 0){ ?>
                                    <select class="form-control" name="class_id">
                                        <?php foreach($classes as $class) { ?>
                                            <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                        <?php }else {
                                            echo "No class please add class first";
                                        }?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="subject_name">Select Subjects</label>
                                    <?php if($subjects_count > 0){ ?>
                                    <select class="select form-control" name="subject_id[]" multiple>
                                        <?php foreach($subjects as $subject) { ?>
                                            <option value="<?php echo $subject['id']; ?>"><?php echo $subject['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                        <?php }else{
                                            echo "No subjects please add subjects first";
                                        }?>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success <?php if($class_count && $subjects_count){echo "";}else{echo "disabled";}?>">Add</button>
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
