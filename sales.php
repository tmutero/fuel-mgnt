<?php
include('functions.php');
//
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<?php include('header.php'); ?>



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


                <div class="box">


<!--                    <div class="col-md-10">-->
<!--                        <div class="input-group" id="adv-search">-->
<!--                            <input type="text" class="form-control"  id="searchProduct" onkeyup="productSearch()" placeholder="Search for Product" />-->
<!--                            <div class="input-group-btn">-->
<!--                                <div class="btn-group" role="group">-->
<!--                                    <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div id="productSearched"></div>-->
<!--                    </div>-->

                    <div class="col-md-10">

                        <form>
                            <input type="text" name="city" size="30" class="city" placeholder="Please Enter City or ZIP code">
                        </form>
                    </div>



                </div>

            </div>

        </div>
        <!-- /.row -->
    </section>
<!--<script>-->
<!--    function productSearch() {-->
<!--        var searchProduct=$("#searchProduct").val();-->
<!---->
<!---->
<!--    }-->
<!--</script>-->


    <script>
        $(document).ready(function() {
            alert("---------------------");

            $('input.city').typeahead({
                name: 'city',
                remote: 'searchProduct.php?query=%QUERY'

            });

        })
    </script>
</div>


<?php include('footer.php');?>

