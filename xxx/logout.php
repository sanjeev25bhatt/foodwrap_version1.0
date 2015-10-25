<?php 
 require('core.inc.php');
 session_destroy();
 setcookie('user_id', $user_id_row['id'], time()-31536000);
 header('Location: '.$http_referer);
?>