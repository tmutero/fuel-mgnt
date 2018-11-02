<?php include('auth.php'); ?>

<?php include('header.php'); ?>

<?php include ('utils.php');

$countUsers = "SELECT * FROM `users`";
$countU = mysqli_query($db, $countUsers);
$totalUsers = mysqli_num_rows($countU);


$countOrders = "SELECT * FROM `orders`";
$countO = mysqli_query($db, $countOrders);
$totalOrders = mysqli_num_rows($countO);

$countProducts = "SELECT * FROM `product`";
$countP = mysqli_query($db, $countProducts);
$totalProduct = mysqli_num_rows($countP);

$countSales = "SELECT sum(quantity) as totalPrice FROM `sales_order`";
$countPurchases = mysqli_query($db, $countSales);
$row = mysqli_fetch_array($countPurchases);
$totalSalesProducts=$row['totalPrice'];

$select="SELECT sum(quantity)-sum(quantity_sold) as total_order FROM `purchased_items`";
$run_select=mysqli_query($db,$select);
$row1=mysqli_fetch_array($run_select);
$total_order1=$row2['total_order'];
?>

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
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Branchs</span>
                        <span class="info-box-number"><?php echo $totalUsers;?></span>
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
                        <span class="info-box-number"><?php echo  $productInstock;?>
                            </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Products Sold</span>
                        <span class="info-box-number"><?php echo $totalSalesProducts;?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

        </div>
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">

                        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales Report</li>
                    </ul>
                    <div class="tab-content no-padding">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><strong>Total Purchase Products </strong></div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <th>Transcation Number</th>
                                                <th>Date Purchased</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>

                                                <th>Branch Username</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                include('../conn.php');
                                                $total_products_price = 0;
                                                $total_cash_order = 0;

                                                $select = "SELECT * FROM sales_order s JOIN product pr ON s.product_id=pr.id JOIN users u ON s.user_id=u.id";
                                                $run_select = mysqli_query($conn, $select);
                                                while ($rows = mysqli_fetch_array($run_select)) {
                                                    $order_num = $rows['invoice'];
                                                    $date_created = $rows['dateCreaTED'];
                                                    $username = $rows['username'];

                                                    $quantity = $rows['quantity'];
                                                    $price = $rows['price'];
                                                    $totalPrice=$quantity*$price;
                                                    $product_name = $rows['name'];

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $order_num; ?></td>
                                                        <td><?php echo $date_created; ?></td>
                                                        <td><?php echo $product_name; ?></td>
                                                        <td><?php echo $quantity; ?></td>
                                                        <td><?php echo $totalPrice; ?></td>
                                                        <td><?php echo $username; ?></td>

                                                    </tr>

                                                    <?php

                                                    $total_products_price =$total_products_price+$totalPrice;


                                                }


                                                ?>
                                                <tr>
                                                    <td align="right"><b>Total</b></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><b><?php echo '$'.$total_products_price;?></b></td>
                                                    <td></td>

                                                </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>





        </div>



    </section>
    <!-- /.content -->
</div>


<?php include('../footer.php');?>


