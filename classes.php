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
                    <h1 class="m-0 text-dark">Classes</h1>
                </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php require_once('includes/db.php'); ?>
            <?php
               $stmt = $con->prepare("SELECT * FROM class order by id desc");
               $stmt->execute();
               $classes = $stmt->fetchALL();
               $num = $stmt->rowCount();
             ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php if(isset($_GET['message'])) {?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> <?php echo $_GET['message']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }?>
                    <table id="class" class="table table-bordered table-hover">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Class Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($num > 0) {  ?>
                                <?php foreach($classes as $class) { ?>
                                    <?php 
                                        $sql = "SELECT * FROM students WHERE class_id = ?";
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute(array($class['id']));
                                        $count = $stmt->rowCount();
                                    ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $class['name']; ?></td>
                                        <td><a href="class-subjects.php?class_no=<?php echo $class['id'] ?>" class="btn btn-success btn-sm">Manage Subjects</a></td>
                                        <td><a href="edit-class.php?class_no=<?php echo $class['id'] ?>" class="btn btn-warning btn-sm">Edit</a></td>
                                        <td><a href="delete-class.php?class_no=<?php echo $class['id'] ?>" class="btn btn-danger btn-sm <?php if($count > 0){echo "disabled";}else{echo "";} ?>" onclick="return confirm('Are you sure you want to delete this record ?')">Delete</a></td>
                                    </tr>
                                <?php } //end foreach ?>
                            <?php } //end if ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Class Name</th>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">#</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="mt-20">
                        <a href="create-class.php" class="btn btn-success">Create New</a>
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
        <script>
            $(function () {
                $('#class').DataTable();
            });
        </script>
    </body>
</html>
