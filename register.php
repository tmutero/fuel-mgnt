<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Zuva Sys</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/datepicker3.css" rel="stylesheet">
</head>
<body>
<body style="background-image: url('assets/images/bodybg.gif'); ">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.php">
                    <h4></h4>
                </a>
            </div>
            <div class="login-form">
                <form method="post" action="register.php">
                    <center> <img src="assets/images/appointment.png" class="img-responsive" alt="logo" height="100px" width="100px"></center>
                    <?php echo display_error(); ?>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="username" value="<?php echo $username; ?>">

                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label>Branch Name</label>
                        <input class="form-control" placeholder="Branch name" name="branch_name" type="text" value="">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" placeholder="Address " name="address" type="text" value=""></textarea>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password_1" >
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password_2" >
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Agree the terms and policy
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="register_btn">Register</button>
                    <div class="social-login-content">

                    </div>
                    <div class="register-link m-t-15 text-center">
                        <p>Already have account ? <a href="login.php"> Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>