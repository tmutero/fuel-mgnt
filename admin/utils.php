<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 9/28/18
 * Time: 8:15 PM
 */


include('../conn.php');
$countProduct = "SELECT * FROM product;";
$countP = mysqli_query($conn, $countProduct);
$totalP=mysqli_num_rows($countP);


$countOrder = "SELECT * FROM orders";
$countO = mysqli_query($conn, $countOrder);
$totalO=mysqli_num_rows($countO);

$select2="SELECT sum(qty)- sum(quantity_sold) as total_order FROM `product` ";
$run_select2=mysqli_query($conn,$select2);
$row2=mysqli_fetch_array($run_select2);
$productInstock=$row2['total_order'];

?>