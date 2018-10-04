<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 9/27/18
 * Time: 9:25 AM
 */

include('../functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

?>