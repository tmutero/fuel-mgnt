<?php
include 'conn.php';
if (isset($_POST['name'])) {
    $id = $_POST['name'];

    $select = "SELECT * FROM `product` WHERE id='$id'";
    $run_select = mysqli_query($conn, $select);


    while ($row = mysqli_fetch_array($run_select)) {

        $price= $row['price'];
        ?>


        <div class="form-group">
            <label>Price per unit</label>
            <input type="text" class="form-control" value="<?php echo $price;?>" id="unit_price" disabled>
        </div>

        <?php


    }

}
