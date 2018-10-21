<?php
include('functions.php');
//
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<?php include('header.php'); ?>

<script src="assets/jquery-1.12.3.min.js"></script>
<script src="assets/bootstrap-datepicker1.js"></script>
<link rel="stylesheet" href="assets/datepicker.css">

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

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Daily stock sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>53</h3>

                            <p>Branch daily sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">

                            <h3 class="panel-title">Order List</h3>

                            <span id="alert_action"></span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            <button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>
                        </div>
                    </div>





            </div>

        </div>
        <!-- /.row -->
    </section>
<div id="orderModal" class="modal fade">

    <div class="modal-dialog">
        <form method="post" id="order_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Create Order</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Enter Product Details</label>
                        <hr />
                        <span id="span_product_details"></span>
                        <hr />
                    </div>
                    <div class="form-group">
                        <label>Select Payment Status</label>
                        <select name="payment_status" id="payment_status" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="credit">Credit</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="inventory_order_id" id="inventory_order_id" />
                    <input type="hidden" name="btn_action" id="btn_action" />
                    <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
                </div>
            </div>
        </form>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#add_button').click(function(){
            $('#orderModal').modal('show');
            $('#order_form')[0].reset();
            $('.modal-title').html("<i class='fa fa-plus'></i> Create Sales");
            $('#action').val('Add');
            $('#btn_action').val('Add');
            $('#span_product_details').html('');
            add_product_row();
        });

        function add_product_row(count = '')
        {
            var html = '';
            html += '<span id="row'+count+'"><div class="row">';
            html += '<div class="col-md-8">';
            html += '<select name="id[]" id="id'+count+'" class="form-control selectpicker" data-live-search="true" required>';
            html += '<?php echo fill_product_list(); ?>';
            html += '</select><input type="hidden" name="hidden_id[]" id="hidden_id'+count+'" />';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<input type="text" name="quantity[]" class="form-control" required />';
            html += '</div>';
            html += '<div class="col-md-1">';
            if(count == '')
            {
                html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
            }
            else
            {
                html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button>';
            }
            html += '</div>';
            html += '</div></div><br /></span>';
            $('#span_product_details').append(html);

        }

        var count = 0;

        $(document).on('click', '#add_more', function(){
            count = count + 1;
            add_product_row(count);
        });
        $(document).on('click', '.remove', function(){
            var row_no = $(this).attr("id");
            $('#row'+row_no).remove();
        });

        $(document).on('submit', '#order_form', function(event){
            event.preventDefault();
            $('#action').attr('disabled', 'disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url:"sales_action.php",
                method:"POST",
                data:form_data,
                success:function(data){
                    $('#order_form')[0].reset();
                    $('#orderModal').modal('hide');
                    $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
                    $('#action').attr('disabled', false);

                }
            });
        });





    });
</script>
<script>
    $(document).ready(function(){
        $('#inventory_order_date').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    });
</script>

<?php include('footer.php');?>

