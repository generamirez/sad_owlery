<?php
require 'functions.php';
require_once 'connect.php';
require 'header.php';
require 'login_check.php';

?>
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
      <div class="nav-elements"> <a href="add_session.php"><h4> Add Expense </a><h4> </div>
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
    <a href='#' class='element'>Expenses</a>
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
    <a href='#' class='element'>Expenses</a>
    <a href='logout.php' class='element'>Log Out</a>
  
    ";
    }


?>
    
  </div>
<title>Expenses</title>
<body>
<div id="main">
<div class="row container">
<?php
 $sql="SELECT * FROM expenses";
 $sql2= "SELECT * FROM expense_sources";
 $sql3= "SELECT * FROM expense_types";




$exp_table = mysqli_query($dbcon, $sql);
$src_table = mysqli_query($dbcon, $sql2);
$typ_table = mysqli_query($dbcon, $sql3);
 

if($exp_table){
 
echo '<table align="left"
cellspacing="5" cellpadding="8">
 
<tr>
<td align="left"><b>Date</b></td>
<td align="left"><b>Expense Type</b></td>
<td align="left"><b>Voucher</b></td>
<td align="left"><b>Amount</b></td>
<td align="left"><b>Controls</b></td>
</tr>';
}

while($row = mysqli_fetch_array($exp_table)){

  $s = strtotime($row['expense_date']);

  $date = date('m/d/Y', $s);
  $time = date('H:i:s A', $s);
  $id = $row['expense_id'];
  $amt= $row['amount'];
  $voucher=$row['voucher_code'];
  $expid=$row['exptype_id'];

  $typeget=mysqli_query($dbcon, "SELECT exptype_name FROM expense_types where exptype_id='$expid'");

  while($type = mysqli_fetch_array($typeget)){
        $exptype=$type['exptype_name'];
    }
}
  
 ?>
<tr>
	<td><?php echo $date;?></td>
	<td><?php echo $exptype;?></td>
	<td><?php echo $voucher;?></td>
	<td><?php echo $amt;?></td>
	<td><a href="edit_session.php?id=<?php echo $row['session_id'];?>">Edit</a></td>
	<td><a href="delete_expense.php?id=<?php echo $id;?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>
</tr>
  
</table>
</div>
<table>
<tr> <h3> Expense Types </h3> </tr>
<?php
    while($row1 = mysqli_fetch_array($typ_table)){

        $id = $row1['exptype_id'];
        $name = $row1['exptype_name'];
        ?>
      <tr>
	<td><?php echo $name;?></td>
	<td><a href="edit_session.php?id=<?php echo $row['session_id'];?>">Edit</a></td>
	<td><a href="delete_expense.php?id=<?php echo $id;?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>
</tr>
      <?php } ?>
    
</table>


<table>
    <tr> <h3> Expense Sources </h3> </tr>
    <?php
    while($row2 = mysqli_fetch_array($src_table)){

        $id = $row2['exptype_id'];
        $name = $row2['src_name'];
        ?>
      <tr>
	<td><?php echo $name;?></td>
	<td><a href="edit_session.php?id=<?php echo $row['session_id'];?>">Edit</a></td>
	<td><a href="delete_expense.php?id=<?php echo $id;?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>
</tr>
      <?php } ?>
    


</table>

</body>
</div>
</html>