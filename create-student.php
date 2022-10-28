<?php ob_start(); ?>
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
            $count = $stmt->rowCount();

            if($count == 0){
                $message = "please add class first";
                header('Location: students.php?message='.$message);
                exit;
            }
               
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create Student</h1>
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
                            <form method="post" action="insert-student.php" id="regForm">
                                <fieldset>
                                    <legend><h3>Father Info</h3></legend>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Father Name</label>
                                            <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Father Name">
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
                                            <label for="inputPassword4">Job</label>
                                            <input type="text" class="form-control" name="job" id="job" placeholder="Job">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Work Location</label>
                                            <input type="text" class="form-control" name="work_location" id="work_location" placeholder="Work Location">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Address</label>
                                            <input type="text" class="form-control" name="f_address" id="f_address" placeholder="Address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Mobile</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
                                        </div>
                                    </div>
                                </fieldset>
                                <!--student info-->
                                <fieldset>
                                    <legend><h3>Student Info</h3></legend>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student Name</label>
                                            <input type="text" class="form-control" name="stud_name" id="stud_name" placeholder="Student Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Birth Date</label>
                                            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Birth Date">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Birth Place</label>
                                            <input type="text" class="form-control" name="birth_place" id="birth_place" placeholder="Birth Place">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Address</label>
                                            <input type="text" class="form-control" name="stud_address" id="stud_address" placeholder="Address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Registration Year</label>
                                            <input type="text" class="form-control" name="year" id="year" placeholder="Registration Year">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Religion</label>
                                            <select class="form-control" name="religion">
                                                <option value="1" selected>Muslim</option>
                                                <option value="2">Christian</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Select Class</label>
                                            <select class="form-control" name="class_id">
                                                <?php foreach($rows as $row) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
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
        <?php require_once('includes/partials/_student_validations.php'); ?>
    </body>
</html>
