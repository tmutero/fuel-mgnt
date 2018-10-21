<?php


include('conn.php');

include('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$userId = $_SESSION['user']['id'];

if (isset($_POST['btn_action'])) {
    if ($_POST['btn_action'] == 'Add') {
        $total_amount = 0;
        for ($count = 0; $count < count($_POST["id"]); $count++) {
           fetch_product_details($_POST["id"][$count]);

           // $name= $product_details["name"][$count];
            $product_id= $_POST["id"][$count];
            $quantity=$_POST["quantity"][$count];


            $query = "INSERT INTO `sales_order`( `product_id`, `quantity`,`name`, `user_id`) VALUES ($product_id,$quantity,,$userId)";

            $run_insert = mysqli_query($conn, $query);


        }
        echo $query;

        echo "Product sales successfully added.";

    }


}

?>