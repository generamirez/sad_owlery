
<?php
require('connect.php');

$id = stripslashes($_GET['id']);
$due = stripslashes($_GET['due']);
$sql ="UPDATE sessions SET session_status = 0, amt_due = $due, date_end = NOW() WHERE `session_id` = ".$id;
$result = mysqli_query($dbcon,$sql);


if($result){
	header("Location: sessions_view.php");
}
?>
 <a href="sessions_view.php"> Back </a>