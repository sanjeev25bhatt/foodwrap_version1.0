<?php
	include "connect.php";
	require ('core.php');
	if(isset($_SESSION['admin_id'])&&!empty($_SESSION['admin_id'])){
		$admin_id = $_SESSION['admin_id'];
		$user_id = $_POST['user_id'];
		$query = "SELECT * FROM `chat` WHERE `admin-id`='".mysql_real_escape_string($admin_id)."' AND `user-id`='".mysql_real_escape_string($user_id)."'";
		if($query_run = mysqli_query($dbc, $query)){
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0){
?>
<a><li><div class="chat-body clearfix"><h4>We are here to provide you whatever you want.</h4></div></li></a>
<?php
			} else {
				while($admin_row = mysqli_fetch_array($query_run)){
					$chat_text = $admin_row['chat-text'];
					$chat_who = $admin_row['by'];
					if($chat_who == 'user'){
						
?>
<a><li id="float-left" class="left clearfix">
	<div  id="move-right" class="chat-body clearfix">
        <p><?php echo $chat_text; ?>
		<small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>Just now</small>
        </p>
    </div>
</li></a>


<?php
					} else if($chat_who == 'admin'){
?>
<a><li id="float-right" class="right clearfix">
    <div class="chat-body clearfix">
        <p><?php echo $chat_text; ?>
			<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>Just now</small>
        </p>
    </div>
</li></a>
<?php
					}
				}	
			}
		}
	}
?>


