<!DOCTYPE html>
<html lang="en">
    <?php require_once('includes/header.php'); ?>
    <?php require_once('includes/db.php'); ?>
    <?php
        $stud_no = $_GET['stud_no'];
        $sql = "SELECT * FROM students WHERE stud_no = ?";
        $stmt = $con->prepare($sql);
        //$qq = $stmt->debugDumpParams();
        $stmt->execute(array($stud_no));
        $student = $stmt->fetch();
        $class_id = $student['class_id'];
        $sql = "SELECT * FROM class WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($class_id));
        $class = $stmt->fetch();
        $sql = "SELECT re.*, sub.* FROM student_result as re JOIN subjects as sub on sub.id = re.subject_id and re.student_no = ? AND re.class_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($stud_no, $class_id));
        $results = $stmt->fetchAll();
        $result_count = $stmt->rowCount();
        $sum = array_sum(array_column($results, 'mark'));
    ?>
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
                    <h1 class="m-0 text-dark"><?php echo $student['stud_name']; ?></h1>
                </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                <?php if($result_count > 0) {  ?>
                    <table id="subject" class="table table-bordered table-hover">
                        <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Subject Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Mark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($results as $result) { ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $result['name']; ?></td>
                                    <td><?php echo $result['mark']; ?></td>
                                </tr>
                            <?php } //end foreach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Result</th>
                                <th rowspan="1" colspan="1"><?= $sum/$result_count ?> %</th>
                            </tr>
                        </tfoot>
                    </table>
                <?php }?>
                    <div class="mt-20">
                        <a href="add-result-form.php?stud_no=<?php echo $stud_no; ?>" class="btn btn-success">Add Result</a>
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
                $('#subject').DataTable();
            });
        </script>
    </body>
</html>
