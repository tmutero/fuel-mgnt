<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Zuva Sys</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/datepicker3.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

</head>
<body style="background-image: url('assets/images/bodybg.gif'); ">



<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-info">
           <center><div class="panel-heading">Zuva Automated System</div>
           <h4>Log in</h4></center>
            <div class="panel-body">
                <form role="form" method="post" action="login.php">
                    <center> <img src="assets/images/appointment.png" class="img-responsive" alt="logo" height="150px" width="200px"></center>
                    <?php echo display_error(); ?>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="username" name="username" type="text" autofocus="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <div class="input-group">
                            <button type="submit"  name="login_btn" class="btn btn-primary">Login</button>


                        </div>
                        <div class="input-group">
                            <p>
                                Not yet a member? <a href="register.php">Sign up</a>
                            </p>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

</body>
</html>