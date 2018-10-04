<?php

     require_once('conn.php');

$userID=$_GET['userID'];

     $sql = "SELECT *, date_format(date_created,'%d-%m-%Y %r') as cdt from chats where user_id='$userID' order by id desc limit 200";
     $sql = "SELECT * FROM (" . $sql . ") as ch order by id";
     $result = mysqli_query($conn,$sql) or die('Query failed: ' . mysqli_error());
     
     // Update Row Information
     $msg="<table border='0' style='font-size: 10pt; color: blue; font-family: verdana, arial;'>";
     while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC))
     {
           $msg = $msg . "<tr><td>" . $line["cdt"] . "&nbsp;</td>" .
                "<td>" . $line["username"] . ":&nbsp;</td>" .
                "<td>" . $line["comment"] . "</td></tr>";
     }
     $msg=$msg . "</table>";
     
     echo $msg;

?>





