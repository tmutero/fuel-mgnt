<?php

     require_once('../conn.php');

$userID=$_GET['userID'];

     $sql = "SELECT c.id as id,c.message,u.username,c.user_id as userID, date_format(date_created,'%d-%m-%Y %r') as cdt from chat c JOIN users u WHERE c.user_id=u.id order by c.id desc limit 200";
     $sql = "SELECT * FROM (" . $sql . ") as ch order by id";
     $result = mysqli_query($conn,$sql) or die('Query failed: ' . mysqli_error());
     


     while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC))
     {
          if($line['userID'] ==$userID){
?>
              <div class="item" style="padding-bottom: 3%">
               <div class="right clearfix"><span class="chat-img pull-right">
								<img src="../assets/images/admin_profile.png" width="70" height="70" alt="User Avatar" class="img-circle" />
								</span>
                    <div class="chat-body clearfix">
                         <div class="header"><strong class="pull-left primary-font"><?php echo $line['username'];?></strong> <small class="text-muted"><?php echo $line['cdt'];?></small></div>
                         <p><?php echo $line['message'];?></p>
                    </div>
               </div>
          </div>
              <?php



          }else

          {

              ?>
<div class="item" style="padding-bottom: 3%">
               <div class="left clearfix"><span class="chat-img pull-left">
								<img src="../assets/images/user.png" width="50" height="50" alt="User Avatar" class="img-circle" />
								</span>
                    <div class="chat-body clearfix">
                         <div class="header"><strong class="primary-font"><?php echo $line['username'];?></strong> <small class="text-muted"><?php echo $line['cdt'];?></small></div>
                         <p><?php echo $line['message'];?></p>
                    </div>
               </div>
               </div>





              <?php

          }




     }


?>





