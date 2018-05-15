
<?php
require('connect.php');

$id = stripslashes($_GET['id']);
$sql ="DELETE FROM `products` WHERE `product_id` = ".$id;
$result = mysqli_query($dbcon,$sql);


if($result){
	header("Location: products_view.php");
}
?>
 <a href="products_view.php"> Back </a>