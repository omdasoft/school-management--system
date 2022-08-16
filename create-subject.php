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
                        <h1 class="m-0 text-dark">Create Subject</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->        
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-body">
                            <form method="post" action="insert-subject.php">
                                <div class="form-group col-md-6">
                                    <label for="subject_name">Subject Name</label>
                                    <input type="text" class="form-control" name="subject_name" id="subject_name" placeholder="Subject Name" required>
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
