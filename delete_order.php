
<?php
require('connect.php');

$id = stripslashes($_GET['id']);
$sql ="DELETE FROM `orders` WHERE `order_id` = ".$id;
$result = mysqli_query($dbcon,$sql);


if($result){
	header("Location: orders_view.php");
}
?>
 <a href="orders_view.php"> Back </a>