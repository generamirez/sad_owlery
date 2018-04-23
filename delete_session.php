
<?php
require('connect.php');

$id = stripslashes($_GET['id']);
$sql ="DELETE FROM `sessions` WHERE `session_id` = ".$id;
$result = mysqli_query($dbcon,$sql);


if($result){
	header("Location: sessions_view.php");
}
?>
 <a href="sessions_view.php"> Back </a>