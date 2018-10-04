<?php

require_once('conn.php');



if(isset($_GET['msg']))
{
$msg = $_GET["msg"];

$user = $_GET["userID"];


$sql = "INSERT INTO `comments`( `comment`,`topic_id` ,`username`) VALUES ('$msg','$topic_id','$user')";

echo $sql;

$result = mysqli_query($conn, $sql);
if (!$result) {
    throw new Exception('Query failed: ' . mysqli_error());
    exit();
}
}
?>





