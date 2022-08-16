<!DOCTYPE html>
<html lang="en">
    <?php require_once('includes/header.php'); ?>
    <?php require_once('includes/db.php'); ?>
    <?php
        $class_no = $_GET['class_no'];
        $sql = "SELECT s.id,s.name,c.class_id, c.subject_id, c.id as class_sub_id  FROM subjects as s JOIN class_subjects as c WHERE s.id = c.subject_id and c.class_id = ? ";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($class_no));
        $rows = $stmt->fetchALL();
        $num = $stmt->rowCount();
        $sql = "SELECT name FROM class where id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($class_no));
        $class = $stmt->fetch();
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
                    <h1 class="m-0 text-dark"><?php echo $class['name']; ?></h1>
                </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                <?php if($num > 0) {  ?>
                    <table id="subject" class="table table-bordered table-hover">
                        <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Subject Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row) { ?>
                                <tr role="row" class="odd">
                                    <td><?php echo $row['name']; ?></td>
                                    <td><a href="delete-class-subject.php?class_sub_id=<?php echo $row['class_sub_id'] ?>&&class_no=<?php echo $class_no; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                            <?php } //end foreach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Subject Name</th>
                                <th rowspan="1" colspan="1">#</th>
                            </tr>
                        </tfoot>
                    </table>
                <?php }?>
                    <div class="mt-20">
                        <a href="create-class-subject.php" class="btn btn-success">Add Subjects</a>
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
