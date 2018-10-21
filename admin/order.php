<?php include('auth.php'); ?>

<?php include('header.php'); ?>
<title>Zuva Automated| Product</title>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order Details

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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Ordered</th>
                                <th> Order Code</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include('../conn.php');
                            $select = "SELECT o.id as id, o.price,o.transaction_code,p.name,o.datecreated,o.quantity,o.status FROM
                            `orders` o JOIN  product p WHERE  o.product_id=p.id ";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $price = $rows['price'];
                                $transaction_code = $rows['transaction_code'];
                                $productName = $rows['name'];
                                $datecreated = $rows['datecreated'];
                                $quantity=$rows['quantity'];
                                $total_price=$rows['price'];

                                if ($rows['status']=="approved") {
                                    $status="success";
                                    $icon='approved';
                                    $checked='';

                                } else {
                                    $status="danger";
                                    $icon='pending';
                                    $checked = 'disabled';
                                }
                                ?>
                                <tr>
                                    <td><?php echo $productName; ?></td>
                                    <td><?php echo $transaction_code; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $quantity;?></td>
                                    <td><?php echo $total_price;?></td>
                                    <td><?php echo $datecreated; ?></td>

                                    <td class="<?php echo $status?>"><?php echo $icon;?></td>


                                    <td class='text-center'><a href='#' id="<?php echo  $rows["id"];?>" class='aprove'><span class='glyphicon glyphicon-user' aria-hidden='true'>Approve</span></a></td>



                                </tr>
                                <?php
                            }

                            ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Product Ordered</th>
                                <th> Order Code</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date Created</th>
                                <th>Status</th>
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
<script type="text/javascript">
    $(function () {
        $(".aprove").click(function () {

            var element = $(this);
            var appid = element.attr("id");
            var info = appid;


            if (confirm("Are you sure you want to approve this?")) {
                $.ajax({
                    type: "POST",
                    url: "approve_order.php",
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

<?php include('footer.php');?>
