<?php


include('conn.php');

include('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$userId = $_SESSION['user']['id'];

function createRandomOrder()
{
    $chars = "997662500087652";
    srand((double)microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 5) {

        $num = rand() % 22;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}

$invoice = 'RC' . createRandomOrder();



if (isset($_POST['btn_action'])) {
    if ($_POST['btn_action'] == 'Add') {
        $total_amount = 0;
        for ($count = 0; $count < count($_POST["id"]); $count++) {
           fetch_product_details($_POST["id"][$count]);

           // $name= $product_details["name"][$count];
            $product_id= $_POST["id"][$count];
            $quantity=$_POST["quantity"][$count];
            $code=$_POST["code"][$count];


            $query = "INSERT INTO `sales_order`(`invoice`, `product_id`, `quantity`,`product_code`, `user_id`) VALUES ('$invoice',$product_id,$quantity,'$code',$userId)";

            $run_insert = mysqli_query($conn, $query);

            //Update Product Quantity
            $update="UPDATE `product` SET `quantity_sold`=`qty_sold`+'$quantity' WHERE id='$product_id' ";
            $run_insert2=mysqli_query($conn,$update);
        }


        echo "Product sales successfully added.";

    }


}

?>