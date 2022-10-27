<!DOCTYPE html>
<html lang="en">
    <?php require_once('includes/header.php'); ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        <?php require_once('includes/navbar.php'); ?>

        <!-- Main Sidebar Container -->
        <?php require_once('includes/sidebar.php'); ?>
        <?php require_once('includes/db.php'); ?>
        <?php
            $stmt = $con->prepare("SELECT * FROM class order by id asc");
            $stmt->execute();
            $rows = $stmt->fetchALL();
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Teacher</h1>
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
                            <form method="post" action="insert-teacher.php" id="regForm">
                                <fieldset>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Teacher Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Teacher Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="education">Education</label>
                                            <select class="form-control" name="education">
                                                <option value="High School Graduate" selected>High School Graduate</option>
                                                <option value="Bachelor’s Degree">Bachelor’s Degree</option>
                                                <option value="Master’s Degree">Master’s Degree</option>
                                                <option value="Doctorate Degree">Doctorate Degree</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="join_date">Join Date</label>
                                            <input type="date" class="form-control" name="join_date" id="join_date" placeholder="join date">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">
                                        </div>
                                    </div>
                                </fieldset>
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
        <?php require_once('includes/partials/_teacher_validations.php'); ?>
    </body>
</html>
