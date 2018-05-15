<?php require 'connect.php'?>
<?php require 'functions.php'?>
<?php require 'scripts.php'?>
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
  
    <div class="navbar-nav1" id="nav">
      <div class="nav-elements"><h2> Add Orders </h2> </div>
    </div>
    

  </nav>

 <?php require 'sidebar.php'; ?>
 <div id="main">
    <form method="post" action="add_orders.php">
	<table>
		<tr><td>Cash Voucher</td><tr>
		<tr>
			<td> <input type="text" name="cash_voucher" class="textinput" required> </td>
		</tr>
		<tr><td>Product</td><td>Quantity</td></tr>
		<tr>
			<td>
			<select name="product" required>
				<?php
				$command= "SELECT * from products";
				$result = mysqli_query($dbcon, $command);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $product=$row['product_name'];
				?>
				  <option value ="<?php echo $product; ?>"> <?php echo $product; ?> </option>
				<?php
				} 
				?>
            </select>
			</td>
			<td>
			<input type="number" name="product_quantity" required>
			</td>
		</tr>
   
		<tr>
		<td> <input type="submit" name="submit_btn" value="Submit">
		</tr>

	</table>
</form>


</div>
</body>
</html>