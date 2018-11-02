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
$countChats="SELECT * FROM `chat`";
$countC = mysqli_query($conn, $countChats);
$totalChatsReceived=mysqli_num_rows($countC);


$select1="SELECT sum(quantity) as total_order FROM `sales_order` where user_id='$userId'";
$run_select1=mysqli_query($conn,$select1);
$row1=mysqli_fetch_array($run_select1);
$totalQuantity=$row1['total_order'];

$select2="SELECT sum(qty)- sum(quantity_sold) as total_order FROM `product` ";
$run_select2=mysqli_query($conn,$select2);
$row2=mysqli_fetch_array($run_select2);
$productInstock=$row2['total_order'];





?>