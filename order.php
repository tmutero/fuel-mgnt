<?php include ('auth.php');?>

<?php include('header.php'); ?>


<title>Zuva Automated |System::Order</title>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order List

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Order</a></li>

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
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-2">


                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#placeOrder">
                                New Order
                            </button>
                        </div>
                        <div class="col-md-2">

                        </div>


                    </div>


                    <div id="orderSuccess"></div>
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
                                <th>Status</th>
                                <th>Date Created</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include('conn.php');
                            $select = "SELECT  o.price ,o.transaction_code, o.status, p.name , o.datecreated,o.quantity,o.unit_price FROM
                            `orders` o JOIN  product p WHERE  o.product_id=p.id AND user_id='$userId'";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $price = $rows['price'];
                                $transaction_code = $rows['transaction_code'];
                                $status = $rows['status'];
                                $productName = $rows['name'];
                                $datecreated = $rows['datecreated'];
                                $unit_price=$rows['unit_price'];
                                $quantity=$rows['quantity'];
                                ?>
                                <tr>
                                    <td><?php echo $productName; ?></td>
                                    <td><?php echo $transaction_code; ?></td>
                                    <td><?php echo $unit_price;?></td>
                                    <td><?php echo $quantity;?></td>

                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $datecreated; ?></td>


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
                                <th>Status</th>
                                <th>Date Created</th>
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
    <div id="placeOrder" class="modal fade" role="dialog">
        <div class="modal-dialog  ">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Place Order</h4>
                </div>
                <div class="modal-body">


                    <form>

                        <div class="form-group">
                            <label>Product Name</label>
                            <select class="form-control" id="name" onchange="getProduct()">
                                <option value="">Select Product</option>
                                <?php
                                $select="SELECT * FROM `product`";
                                $run_sel=mysqli_query($conn,$select);
                                while ($row=mysqli_fetch_array($run_sel)) {
                                    $id=$row['id'];
                                    $name=$row['name'];

                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div id="prod">

                        </div>

                        <div class="form-group">
                            <label>Total Quantity Required</label>
                            <input type="text" class="form-control" placeholder="Enter ..." id="total" onkeyup="sum()">
                        </div>

                        <div class="form-group">
                            <label>Total Cost</label>
                            <input type="text" class="form-control" placeholder="Total Cost" id="amount" disabled>
                        </div>
                        <input type="hidden" id="userId" value="<?php echo  $userId;?>">





                        <div class="form-group">
                            <label>Payment Type</label>
                            <select class="form-control" id="payment_type">
                                <option value="">Select Method</option>
                                <option value="cash">Cash Payment</option>
                                <option value="bank">Bank Transfer Payment</option>
                            </select>

                        </div>








                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Cancel</button>
                            <button class="btn btn-info pull-right" type="button" id="btn" onclick="saveOrder()">Save</button>
                        </div>




                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <!-- /.content -->
</div>
<script type="text/javascript">
    function getProduct() {
        var name =$("#name").val();
        $.post("getProduct.php", {
                name :name ,
            },
            function(data) {
                $('#prod').html(data);
            });
    }
</script>

<script type="text/javascript">
    function saveOrder() {
        var name =$("#name").val();
        var btn=$("#btn").val();
        var total =$("#total").val();
        var unit_price =$("#unit_price").val();
        var amount =$("#amount").val();
        var payment_type=$("#payment_type").val();
        var userId=$("#userId").val();


        $.post("saveOrder.php", {
                name :name ,
                btn:btn,
                total:total,
                unit_price:unit_price,
                amount:amount,
                payment_type:payment_type,
                userId:userId,

            },
            function(data) {

                $('#orderSuccess').html(data);
            });
    }
</script>

<script>
    function sum() {

        var txtFirstNumberValue = document.getElementById('total').value;
        var txtSecondNumberValue = document.getElementById('unit_price').value;
        var result = txtFirstNumberValue * txtSecondNumberValue;

        if (!isNaN(result)) {
            document.getElementById('amount').value = result;

        }


    }
</script>
<?php include('footer.php'); ?>

