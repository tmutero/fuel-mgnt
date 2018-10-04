<?php include('auth.php'); ?>

<?php include('header.php'); ?>

<?php include ('utils.php');?>
<title>Zuva Automated |Systsem::Admin</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Homepage

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Products</span>
                        <span class="info-box-number"><?php echo $totalP;?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-reorder"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Orders</span>
                        <span class="info-box-number"><?php echo $totalO;?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Stock</span>
                        <span class="info-box-number">13,648</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

        </div>
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">

                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales Report</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                    </div>
                </div>

            </section>

            <section class="col-lg-5 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">

                        <li class="pull-left header"><i class="fa fa-calendar"></i> Calendar</li>
                    </ul>

                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                </div>

            </section>



        </div>



    </section>
    <!-- /.content -->
</div>


<?php include('../footer.php');?>


