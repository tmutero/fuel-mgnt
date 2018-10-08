<?php include ('auth.php');?>

<?php include('header.php'); ?>

<?php include ('utils-user.php');?>

    <title>Zuva Automated |Systsem::Home</title>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Chats

            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Chats</li>
            </ol>
        </section>


        <section class="content">


           <div class="row">


               <section class="col-lg-5 connectedSortable">
                   <div class="box box-success">
                       <div class="box-header">
                           <i class="fa fa-comments-o"></i>

                           <h3 class="box-title">Chat</h3>

                           <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                               <div class="btn-group" data-toggle="btn-toggle">
                                   <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                                   </button>
                                   <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                               </div>
                           </div>
                       </div>
                       <div class="box-body chat" id="chat-box">


                       <div id="chat_response"></div>



                           <!-- /.item -->
                       </div>
                       <!-- /.chat -->
                       <div class="box-footer">
                           <div class="input-group">
                               <input type="hidden" id="userID"  name="userID" value="<?php echo  $_SESSION['user']['id']; ?>">
                               <input class="form-control" placeholder="Type message..." id="txtmsg" style="width: 350px" type="text" name="msg" >

                               <div class="input-group-btn">
                                   <button type="button" class="btn btn-success" onclick="set_chat_msg()"><i class="fa fa-plus"></i></button>
                               </div>
                           </div>
                       </div>
                   </div>
               </section>
            </div>

        </section>
    </div>

    <script type="text/javascript">

        var t = setInterval(function(){get_chat_msg()},3000);

        var oxmlHttp;
        var oxmlHttpSend;

        function get_chat_msg()

        {     var userID=$("#userID").val();

            if(typeof XMLHttpRequest != "undefined")
            {
                oxmlHttp = new XMLHttpRequest();
            }
            else if (window.ActiveXObject)
            {
                oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
            }
            if(oxmlHttp == null)
            {
                alert("Browser does not support XML Http Request");
                return;
            }
            var url = "chat_recv_ajax.php";
            url += "?userID=" + userID;

            oxmlHttp.onreadystatechange = get_chat_msg_result;
            oxmlHttp.open("GET",url,true);
            oxmlHttp.send(null);
        }

        function get_chat_msg_result()
        {
            if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
            {
                if (document.getElementById("chat_response") != null)
                {
                    document.getElementById("chat_response").innerHTML =  oxmlHttp.responseText;
                    oxmlHttp = null;
                }
              //  var scrollDiv = document.getElementById("DIV_CHAT");
                //scrollDiv.scrollTop = scrollDiv.scrollHeight;
            }
        }


        function set_chat_msg()
        {

            if(typeof XMLHttpRequest != "undefined")
            {
                oxmlHttpSend = new XMLHttpRequest();
            }
            else if (window.ActiveXObject)
            {
                oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
            }
            if(oxmlHttpSend == null)
            {
                alert("Browser does not support XML Http Request");
                return;
            }

            var url = "chat_send_ajax.php";
            var strname="noname";
            var strmsg="";

            var userID=$("#userID").val();


            if (document.getElementById("txtname") != null)
            {
                strname = document.getElementById("txtname").value;
                document.getElementById("txtname").readOnly=true;
            }
            if (document.getElementById("txtmsg") != null)
            {

                strmsg = document.getElementById("txtmsg").value;

                document.getElementById("txtmsg").value = "";
            }



            url += "?userID=" + userID + "&msg=" + strmsg;


            oxmlHttpSend.open("GET",url,true);
            oxmlHttpSend.send(null);
        }

    </script>
<?php include('footer.php');?>