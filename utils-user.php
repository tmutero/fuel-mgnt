<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 9/28/18
 * Time: 8:15 PM
 */

//
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$userId = $_SESSION['user']['id'];


include('conn.php');



$countProduct = "SELECT * FROM `orders` WHERE  user_id='$userId'";
$countP = mysqli_query($conn, $countProduct);
$totalPlacedOrders=mysqli_num_rows($countP);


$countAprOrder = "SELECT * FROM `orders` WHERE  user_id='$userId' AND status='approved'";
$countAP = mysqli_query($conn, $countAprOrder);
$totalAprOrders=mysqli_num_rows($countAP);
if($totalAprOrders !=0)
{
    $approvedOrder=$totalAprOrders;
}
else{
    $approvedOrder=0;
}




?>