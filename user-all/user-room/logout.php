<?php
session_start();
include('../../db/config.php');
$_SESSION['user_all']=="";
date_default_timezone_set('Asia/Dhaka');
$currentTime = date('Y-m-d H:i:s', time ());// h=12 hours H=24 hours
$user_id=$_SESSION['user_all'];
mysqli_query($con, "UPDATE `login_log` SET `logout_time`='$currentTime' WHERE `login_id`= '$user_id' ORDER BY `log_id` DESC LIMIT 1");
session_unset();
?>
<script language="javascript">
document.location="../../index";
</script>
