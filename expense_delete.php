
<?php
require('connect.php');

$id = stripslashes($_GET['id']);
$sql ="DELETE FROM `expenses` WHERE `expense_id` = ".$id;
$result = mysqli_query($dbcon,$sql);


if($result){
	header("Location: expenses_view.php");
}
?>
 <a href="sessions_view.php"> Back </a>