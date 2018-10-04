<?php include('auth.php'); ?>

<?php include('header.php'); ?>
<title>Zuva Automated| Product</title>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product List

        </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <div class="col-md-3">
                            <h3 class="box-title">Product</h3>
                        </div>
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-2">


                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addProduct">
                                New Product
                            </button>
                        </div>
                        <div class="col-md-2">

                        </div>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include('../conn.php');
                            $select = "SELECT * FROM product;";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $name = $rows['name'];
                                $qty = $rows['quantity'];
                                $price = $rows['price'];
                                $code = $rows['code'];
                                $category = $rows['category'];

                                ?>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $code; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $category; ?></td>
                                    <td>
                                        <span class="pull-right-container">
                                         <small class="label pull-right bg-green">Update</small>
                                       </span>
                                    </td>


                                </tr>
                                <?php
                            }

                            ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Product name</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
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


<?php include('footer.php'); ?>
