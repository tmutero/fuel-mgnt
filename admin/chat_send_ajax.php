<?php

require_once('conn.php');



if(isset($_GET['msg']))
{

$msg = $_GET["msg"];

$user = $_GET["userID"];


$sql = "INSERT INTO `chat`( `message`, `user_id`, `date_created`) VALUES ('$msg', '$user', now())";

echo $sql;

$result = mysqli_query($conn, $sql);
if (!$result) {
    throw new Exception('Query failed: ' . mysqli_error());
    exit();
}
}
?>





