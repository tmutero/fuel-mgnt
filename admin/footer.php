<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Tansoft Tech
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Zuva  Sys</a>.</strong> All rights
    reserved.
</footer>
<div id="addProduct" class="modal fade" role="dialog">
    <div class="modal-dialog  ">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Product Add</h4>
            </div>
            <div class="modal-body">


                <form method="POST" action="addProduct.php">

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="name">
                    </div>
                    <div class="form-group">
                        <label>Selling Price</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="price">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="qty">
                    </div>

                    <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="code">
                    </div>


                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category">
                            <option value="fuel">Fuel</option>
                            <option value="gas">Gas</option>
                            <option value="groceries">Groceries</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" placeholder="Enter description" name="description"></textarea>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-info pull-right" name="btn" >Save</button>
                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>


<script src="../assets/bower_components/moment/moment.js"></script>

<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->

<script src="../assets/bower_components/raphael/raphael.min.js"></script>
<script src="../assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
</body>
</html>
