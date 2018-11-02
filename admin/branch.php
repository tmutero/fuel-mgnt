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
            <li><a href="#">Branch List</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <div class="col-md-3">
                            <h3 class="box-title">Branch</h3>
                        </div>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addCustomer">Add
                            New Customer
                        </button>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Branch name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Mananger Name</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            include('../conn.php');
                            $select = "SELECT * FROM  branch JOIN users ON branch.user_id=users.id";
                            $run_select = mysqli_query($conn, $select);
                            while ($rows = mysqli_fetch_array($run_select)) {
                                $name  = $rows['branch_name'];
                                $address  = $rows['address'];
                                $phone  = $rows['phone'];
                                $manager  = $rows['username'];

                                ?>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php echo $phone; ?></td>
                                    <td><?php echo $manager; ?></td>

                                </tr>
                                <?php
                            }

                            ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Branch name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Mananger Name</th>

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
