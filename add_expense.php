<?php require 'connect.php'?>
<?php require 'functions.php'?>

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
      <div class="nav-elements"><h2> Add Expense </h2> </div>
    </div>
    

  </nav>

  
    
  <?php require 'sidebar.php' ?>
  <div id="main">
<div class="container">
  <title>Add Expense</title>
    <form method="post" action="add_expense.php">
	<div class="row">
             <h5 class="col-md-6"> Expense Type </h5>
             <h5 class="col-md-6"> Amount </h5>
    </div>


    <div class="row">
            <select class="col-md-5" name="type" required>
            <?php 
                $command= "SELECT * from expense_types";
                $result = mysqli_query($dbcon, $command);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $id=$row['exptype_id'];
                    $name=$row['exptype_name'];

            ?>
                <option value ="<?php echo $id; ?>"> <?php echo $name; ?> </option>
                <?php } ?>
                </select>
            <div class="col-md-1"> </div>
            <input type="number" class="col-md-4" name = "amount" required> </input>
    </div>

    <div class="row">
            <h5 class="col-md-6"> Source </h5>
            <h5 class="col-md-6"> Cash Voucher </h5>
    </div>


    <div class="row">
            <select class="col-md-5" required name="source">
            <?php 
                $command= "SELECT * from expense_sources";
                $result = mysqli_query($dbcon, $command);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $id=$row['src_id'];
                    $name=$row['src_name'];

            ?>
                <option value ="<?php echo $id; ?>"> <?php echo $name; ?> </option>
                <?php 
              
              } ?>
                </select>
            <div class="col-md-1"> </div>
            <input type="text" class="col-md-4" required name="voucher"> </input>
    </div>

    <div class="row">
            <input type="submit" name="add_exp" value="Confirm" class="col-md-6">
              
            <input class="col-md-6" type="submit" value="Cancel"> </input>
    </div>
</div>
</form>

</div>
</div>
 </body>
</html>
