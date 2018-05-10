
<?php require 'connect.php';

require 'login_check.php'; ?>
<title>Sessions</title>
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
    <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
        </svg>
      </a>
    </span>

    <div class="navbar-nav1" id="nav">
      <div class="nav-elements"><h2> Expenses </h2> </div>
      <div class="nav-elements"> <a href="add_session.php"><h4> Add Session </a><h4> </div>
    </div>
    

  </nav>

  <div id="side-menu" class="side-nav1">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
    <a  href="login_admin2.php"><img src="imgs/logo.png" class="logo" href="login_admin2.php"></a>

    <h2 align="center">

    <?php echo strtoupper($_SESSION['user']); ?>

</h2>
<h2 align="center">

</h2>

<?php 
  if (strtoupper($_SESSION['level'])=='ADMIN'){
    echo"
    <a href=''#' class='element'>Employees</a>
    <a href='#' class='element'>Equipment</a>
    <a href='#' class='element'>Products</a>
    <a href='expenses_view.php' class='element'>Expenses</a>
    <a href='#' class='element'>Reports</a>
    <a href='#' class='element'>Options</a>
    <a href='logout.php' class='element'>Logout</a>
    ";
  }
  else
  {
    echo "
    <a href='sessions_view.php' class='element'>Sessions</a>
    <a href='#' class='element'>Orders</a>
    <a href='expenses_view.php' class='element'>Expenses</a>
    <a href='logout.php' class='element'>Log Out</a>
  
    ";
    }


?>
    
  </div>
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
