
<?php require 'connect.php';
require 'scripts.php';
require 'sidebar.php'; ?>
<title>Products</title>
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
      <div class="nav-elements"><h2> Products </h2> </div>
      <div class="nav-elements"> <a href="add_product.php"><h4> Add Product </a><h4> </div>
    </div>
    

  </nav>

  
<div id="main">
    


<div class="container">
<?php


 $sql="SELECT * FROM products";

$result = mysqli_query($dbcon,$sql);



$response = mysqli_query($dbcon, $sql);
 

if($response){
 
echo '<table align="left"
cellspacing="5" cellpadding="8">
 
<tr>
<td align="left"><b>Product</b></td>
<td align="left"><b>Price</b></td>
</tr>';
 
while($row = mysqli_fetch_array($response)){


  ?>

 

<tr>
	<td><?php echo $row['product_name'];?></td>
	<td>P<?php echo $row['price'];?></td>
	<td><a href="edit_product.php?id=<?php echo $row['product_id'];?>">Edit</a></td>
	<td><a href="delete_product.php?id=<?php echo $row['product_id'];?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>
</tr>
  
<?php



}
 
echo '</table>';
 
} else {
 
echo "Couldn't issue database query<br/>";
 
echo mysqli_error($dbcon);
 
}
 
// Close connection to the database
 
?>

  </div>

  
</body>
</html>
