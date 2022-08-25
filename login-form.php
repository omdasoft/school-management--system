<?php session_start(); ?>
<?php require_once('includes/header.php'); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="card login-card card-info">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <?php if(isset($_SESSION['login-error'])) {?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $_SESSION['login-error']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }?>
                    <form method="post" action="login.php">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class=" col-md-12 form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class=" col-md-12 form-group">
                                <button type ="submit" name="submit" class="btn btn-success">Signin</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    SMS&copy;2022 All Right Reserved
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
<?php require_once('includes/partials/scripts.php'); ?>
</body>
</html>
