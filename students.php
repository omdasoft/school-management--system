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
                    <h1 class="m-0 text-dark">Students</h1>
                </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php require_once('includes/db.php'); ?>
            <?php
                $stmt = $con->prepare("SELECT * FROM students JOIN class ON class.id = students.class_id order by stud_no desc limit 20");
                $stmt->execute();
                $rows = $stmt->fetchALL();
                $num = $stmt->rowCount();
             ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?php if(isset($_GET['message'])) {?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>warning!</strong> <?php echo $_GET['message']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }?>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Stud Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Class</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Year</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Reg Date</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">#</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($num > 0) {  ?>
                                <?php foreach($rows as $row) { ?>
                                        <tr role="row" class="odd">
                                        <td class="sorting_1"><?php echo $row['stud_name']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['year']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><a href="add-result-form.php?stud_no=<?php echo $row['stud_no'] ?>" class="btn btn-info btn-sm">Add Result</a></td>
                                        <td><a href="show-results.php?stud_no=<?php echo $row['stud_no'] ?>" class="btn btn-success btn-sm">View Result</a></td>
                                        <td><a href="edit-student.php?stud_no=<?php echo $row['stud_no'] ?>" class="btn btn-warning btn-sm">View/Edit</a></td>
                                        <td><a href="delete-student.php?stud_no=<?php echo $row['stud_no'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record ?')">Delete</a></td>
                                    </tr>
                                <?php } //end foreach ?>
                            <?php } //end if ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Stud Name</th>
                                <th rowspan="1" colspan="1">Address</th>
                                <th rowspan="1" colspan="1">Class</th>
                                <th rowspan="1" colspan="1">Year</th>
                                <th rowspan="1" colspan="1">Reg Date</th>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">#</th>
                                <th rowspan="1" colspan="1">#</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="mt-20">
                        <a href="create-student.php" class="btn btn-success">Create New</a>
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
                $('#example2').DataTable();
            });
        </script>
    </body>
</html>
