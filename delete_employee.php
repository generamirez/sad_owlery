
<?php
require('connect.php');

$id = stripslashes($_GET['id']);
$sql ="DELETE FROM `employees` WHERE `esource_id` = ".$id;
$result = mysqli_query($dbcon,$sql);


if($result){
	header("Location: employees_view.php");
}
?>
 <a href="employees_view.php"> Back </a>