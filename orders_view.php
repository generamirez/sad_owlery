
<?php require 'connect.php';
require 'scripts.php'; ?>
<title>Orders</title>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar1">
    <div class="navbar-nav1" id="nav">
      <div class="nav-elements"><h2> Orders </h2> </div>
      <div class="nav-elements"> <a href="add_orders.php"><h4> Add Orders </a><h4> </div>
    </div>
    

  </nav>

 
<div id="main">
   <?php require 'sidebar.php' ?>

<div class="container">
<?php


 $sql="SELECT * FROM orders";

$result = mysqli_query($dbcon,$sql);



$response = mysqli_query($dbcon, $sql);
 

if($response){
 
echo '<table align="left"
cellspacing="5" cellpadding="8">
 
<tr>
<td align="left"><b>Date</b></td>
<td align="left"><b>Order ID</b></td>
<td align="left"><b>Voucher No.</b></td>
<td align="left"><b>Total Price</b></td>
</tr>';
 
while($row = mysqli_fetch_array($response)){

  $s = strtotime($row['datetime_ordered']);

  $date = date('m/d/Y', $s);

  ?>

 

<tr>
	<td><?php echo $date;?></td>
	<td><?php echo $row['order_id'];?></td>
	<td><?php echo $row['voucher_code'];?></td>
	<td>P<?php echo $row['total_order_amount'];?></td>
	<td><a href="order_view.php?id=<?php echo $row['product_id'];?>">View</a></td>
	<td><a href="edit_order.php?id=<?php echo $row['product_id'];?>">Edit</a></td>
	<td><a href="delete_order.php?id=<?php echo $row['product_id'];?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>
</tr>
  
<?php



}
 
echo '</table>';
 
} else {
 
echo "Couldn't issue database query<br/>";
 
echo mysqli_error($dbcon);
 
}
 
// Close connection to the database
mysqli_close($dbcon);
 
?>
<!-- while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['height'] . "</td>";
echo "<td>" . $row['country'] . "</td>";
echo "<td>" . $row['year'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "<td>" . $row['use'] . "</td>";
echo "<td>" . $row['remarks'] . "</td>";
echo "</tr>";
}
echo "</table>";
?> -->
  </div>

  <script>
    function openSlideMenu(){
      document.getElementById('side-menu').style.width = '20%';
      document.getElementById('main').style.marginLeft = '20%';
      document.getElementById('nav').style.marginLeft = '22%';
    }

    function closeSlideMenu(){
      document.getElementById('side-menu').style.width = '0';
      document.getElementById('main').style.marginLeft = '0';
      document.getElementById('nav').style.marginLeft = '0';
    }
  </script>
</body>
</html>
