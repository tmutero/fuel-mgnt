<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 9/29/18
 * Time: 11:28 AM
 *
 **/

include 'conn.php';
if (isset($_POST['btn'])) {

    $userId = $_POST['userId'];

    $productId = $_POST['name'];
    $total = $_POST['total'];
    $unit_price = $_POST['unit_price'];
    $amount = $_POST['amount'];
    $payment_type = $_POST['payment_type'];


    function createRandomPassword()
    {
        $chars = "003232303232023232023456789";
        srand((double)microtime() * 1000000);
        $i = 0;
        $pass = '';
        while ($i <= 6) {

            $num = rand() % 33;

            $tmp = substr($chars, $num, 1);

            $pass = $pass . $tmp;

            $i++;

        }
        return $pass;
    }

    $finalcode = 'ZUV-' . createRandomPassword();




    $query = "INSERT INTO `orders`( `user_id`, `product_id`, `price`, `quantity`, `status`, `payment_type`, `transaction_code`,  `unit_price`)
VALUES ('$userId','$productId','$amount','$total','pending','$payment_type','$finalcode','$unit_price')";
   $run_insert = mysqli_query($conn, $query);




    if ($run_insert) {


        ?>
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i> Order!</h4>
            Successfully added into system.
        </div>

        <?php


    }


}


?>