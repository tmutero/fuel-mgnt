<?php include('auth.php'); ?>

<?php include('header.php'); ?>
<title>Zuva Automated| Product</title>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Branch List

        </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order List</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <div class="col-md-3">
                            <h3 class="box-title">Order</h3>
                        </div>



                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Ordered</th>
                                <th> Transcation Code</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include('../conn.php');
                            $select = "SELECT * FROM
                            `orders` o JOIN  product p WHERE  o.product_id=p.id ";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $price = $rows['price'];
                                $transaction_code = $rows['transaction_code'];
                                $productName = $rows['name'];
                                $datecreated = $rows['datecreated'];
                                $id=$rows['id'];

                                if ($rows['status']=='Approved') {
                                    $status="success";
                                    $icon='Approved';
                                    $checked='';

                                } else {
                                    $status="danger";
                                    $icon='Pending';
                                    $checked = 'disabled';
                                }
                                ?>
                                <tr>
                                    <td><?php echo $productName; ?></td>
                                    <td><?php echo $transaction_code; ?></td>
                                    <td><?php echo $price; ?></td>

                                    <td class="<?php echo $status?>"><?php echo $icon;?></td>

                                    <td><?php echo $datecreated; ?></td>
                                    <td>
                                    </td>


                                </tr>
                                <?php
                            }

                            ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Product Ordered</th>
                                <th> Transcation Code</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>



    <!-- /.content -->
</div>


<?php include('footer.php');?>
