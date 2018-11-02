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
                                <th>Unit</th>
                                <th>Quantity Sold</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include('../conn.php');
                            $select = "SELECT * FROM product;";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $name = $rows['name'];
                                $qty = $rows['qty'];
                                $price = $rows['price'];
                                $code = $rows['code'];
                                $category = $rows['category'];
                                $product_unit=$rows['product_unit'];
                                $quantity_sold=$rows['quantity_sold'];

                                ?>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $code; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $product_unit; ?></td>
                                    <td><?php echo $quantity_sold; ?></td>
                                    <td><?php echo $category; ?></td>
                                    <td class='text-center'><a href='#' id="<?php echo  $rows["id"];?>" class='delete_product'><span class='pe-7s-plus' aria-hidden='true'>Delete</span></a></td>


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
                                <th>Unit</th>
                                <th>Quantity Sold</th>

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
<script type="text/javascript">
    $(function () {
        $(".delete_product").click(function () {

            var element = $(this);
            var appid = element.attr("id");
            var info = appid;


            if (confirm("Are you sure you want to delete this product?")) {
                $.ajax({
                    type: "POST",
                    url: "delete_product.php",
                    data: {info: info},
                    success: function () {
                    }
                });
                $(this).parent().parent().fadeOut(300, function () {
                    $(this).remove();
                });
            }
            return false;
        });
    });
</script>

<?php include('footer.php'); ?>
