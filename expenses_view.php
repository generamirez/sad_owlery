
<?php require 'connect.php'; ?>
<title>Expenses</title>
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
      <div class="nav-elements"><h2> Expenses </h2> </div>
      <div class="nav-elements"> <a href="add_expense.php"><h4> Add Expense </a><h4> </div>
    </div>
    

  </nav>

  <?php require 'sidebar.php' ?>
<div id="main" class="container">


<div class="expenses col-md-12">

<?php
  $sql="select * from expenses";

  $query= mysqli_query($dbcon, $sql);



  echo "<table align='center' border='1'>
  <tr>
  <th>Date</th>
  <th>Expense Type</th>
  <th>Voucher No.</th>
  <th>Total Amount</th>
  <th>Controls</th>
  </tr>";


  while ($row=mysqli_fetch_array($query)){
    echo "<tr>";
    $s = strtotime($row['expense_date']);

    $date = date('m/d/Y', $s);
    $time = date('H:i:s A', $s);
    echo "<td>". $date . "</td>";
    $id = $row["exptype_id"];
    $cmd="SELECT exptype_name FROM expense_types where exptype_id= '$id'";
    $getType= mysqli_query($dbcon, $cmd);
    $typeArr=mysqli_fetch_array($getType, MYSQLI_NUM);
    echo "<td>". $typeArr[0] . "</td>";
    echo "<td>". $row['voucher_code'] . "</td>";
    
    echo "<td>". $row['amount'] . "</td>";

    ?>
    <td> <a href="edit_expense.php?id=<?php echo $row['expense_id'];?>"> Edit </a>
    <a href="delete_expense.php?id=<?php echo $row['expense_id'];?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a> </td>
  <?php }
  echo "</table>"
?>

</div>



<div class="expense_types container">
 <?php
  $sql="select * from expense_types";

  $query= mysqli_query($dbcon, $sql);


  echo " <h1> Expense Types </h1>";
  

  while ($row=mysqli_fetch_array($query)){
    
    ?>
  <table align='center' border='1' class='col-md-6'>
  <tr>
  <td><?php echo $row['exptype_name'] ?> </td>  
  <td> <a> Edit </a> <a>Delete</a></td>
  </tr>


<?php
  }
?>

</div>


</div>
</body>

</html>
