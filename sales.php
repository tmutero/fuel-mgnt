<?php
include('functions.php');
//
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<?php include('header.php'); ?>



<title>Zuva Automated |Systsem::Sales</title>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sales

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sales</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Daily Total Sales</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-social-usd"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Products </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>


    </section>
    <!-- /.content -->
</div>


<?php include('footer.php');?>

