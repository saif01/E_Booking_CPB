<?php
session_start();
include('../db/config.php');
$_SESSION['admin-room-login']=="";
date_default_timezone_set('Asia/Dhaka');
$currentTime = date('Y-m-d H:i:s', time ());//H, Time in 24 hours show , h, for 12
$login_id=$_SESSION['admin-room-login'];

$logout_time_update=mysqli_query($con, "UPDATE `login_log` SET `logout_time`='$currentTime' WHERE `login_id`='$login_id' ORDER BY `login_id` DESC LIMIT 1");
session_unset();
?>
<script language="javascript">
document.location="../admin";
</script>
