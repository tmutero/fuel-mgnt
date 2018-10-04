<?php
include ('../conn.php');
if (isset($_POST["btn"])) {

    $price = $_POST['price'];
    $name = $_POST['name'];
    $qty = $_POST['qty'];
    $description=$_POST['description'];
    $category=$_POST['category'];
    $code=$_POST['code'];

    $query = "INSERT INTO `product`(`name`, `description`, `category`, `price`, `quantity`, `code`,`onhand_qty`) VALUES ('$name','$description','$category','$price','$qty','$code','$qty')";
    $run_insert=mysqli_query($conn,$query);



   if ($run_insert){



       ?>

       <script>setTimeout(function(){window.location.href='product.php'},500);</script>

       <?php



    }

}
?>


