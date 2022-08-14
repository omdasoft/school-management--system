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
                        <h1 class="m-0 text-dark">Edit Student</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php require_once('includes/db.php'); ?>
            <?php
                if(isset($_GET['stud_no'])) {
                    $stud_no = $_GET['stud_no'];
                    $qry = "SELECT stud.*, f.* FROM students as stud JOIN fathers as f on stud.f_id = f.f_no WHERE stud.stud_no = ? LIMIT 1";
                    $stmt = $con->prepare($qry);
                    $stmt->execute(array($stud_no));
                    $row = $stmt->fetch();
                    $num = $stmt->rowCount();
                    if($num == 0)
                        header('Location: students.php');
                }
                
             ?>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <div class="card-body">
                            <form method="post" action="update-student.php" id="regForm">
                                <fieldset>
                                    <legend><h3>Father Info</h3></legend>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Father Name</label>
                                            <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Father Name" value="<?php echo $row['f_name'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="education">Education</label>
                                            <select class="form-control" name="education">
                                                <option value="<?php echo $row['education'] ?>" selected><?php echo $row['education']; ?></option>
                                                <option value="Bachelor’s Degree">Bachelor’s Degree</option>
                                                <option value="Master’s Degree">Master’s Degree</option>
                                                <option value="Doctorate Degree">Doctorate Degree</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Job</label>
                                            <input type="text" class="form-control" name="job" id="job" placeholder="Job" value="<?php echo $row['job']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Work Location</label>
                                            <input type="text" class="form-control" name="work_location" id="work_location" placeholder="Work Location" value="<?php echo $row['work_location'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Address</label>
                                            <input type="text" class="form-control" name="f_address" id="f_address" placeholder="Address" value="<?php echo $row['address'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Mobile</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $row['mobile'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <!--student info-->
                                <fieldset>
                                    <legend><h3>Student Info</h3></legend>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Student Name</label>
                                            <input type="text" class="form-control" name="stud_name" id="stud_name" placeholder="Student Name" value="<?php echo $row['stud_name'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Birth Date</label>
                                            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Birth Date" value="<?php echo $row['birth_date'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Birth Place</label>
                                            <input type="text" class="form-control" name="birth_place" id="birth_place" placeholder="Birth Place" value="<?php echo $row['birth_place'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Address</label>
                                            <input type="text" class="form-control" name="stud_address" id="stud_address" placeholder="Address" value="<?php echo $row['address'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Registration Year</label>
                                            <input type="text" class="form-control" name="year" id="year" placeholder="Registration Year" value="<?php echo $row['year'] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Religion</label>
                                            <select class="form-control" name="religon">
                                                <option value="<?php $row['religon'] ?>" selected><?php if($row['religon'] == '1') {echo "Muslim";}else{echo "Christian";} ?></option>
                                                <option value="1">Muslim</option>
                                                <option value="2">Christian</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="hidden" name="f_no" value="<?php echo $row['f_no']; ?>">
                                <input type="hidden" name="stud_no" value="<?php echo $row['stud_no']; ?>">

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
        <script>
            $(document).ready(function(){
                $.validator.setDefaults({
                    submitHandler: function () {
                        return true;
                    }
                });
                $('#regForm').validate({
                    rules: {
                        f_name: {
                            required: true,
                            minlength: 3,
                        },
                        job: {
                            required: true,
                        },
                        work_location: {
                            required: true
                        },
                        f_address: {
                            required: true,
                        },
                        mobile: {
                            required: true,
                            number: true,
                            minlength: 11
                        },
                        stud_name: {
                            required: true
                        },
                        birth_date: {
                            required: true
                        },
                        birth_place: {
                            required: true
                        },
                        stud_address: {
                            required: true
                        },
                        year: {
                            required: true,
                            number: true,
                            maxlength: 4
                        }
                    },
                    messages: {
                        f_name: {
                            required: "father name field is required",
                            maxlength: "father name must be more than 50 characters long"
                        },
                        job: {
                            required: "job field is required",
                        },
                        work_location: {
                            required: "work location field is required"
                        },
                        f_address: {
                            required: "father address is required"
                        },
                        mobile: {
                            required: "mobile field is required",
                            number: "mobile filed must be number",
                            minlength: "mobile filed must be at least 11 numbers"
                        },
                        stud_name: {
                            required: "student name field is required"
                        },
                        birth_date: {
                            required: "date birth field is required"
                        },
                        birth_place: {
                            required: "birth place field is required"
                        },
                        stud_address: {
                            required: "student address field is required"
                        },
                        year: {
                            required: "year field is required",
                            number: "year field must be numbers",
                            maxlength: "year field must not be more than 4 numbers"
                        }

                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>
    </body>
</html>
