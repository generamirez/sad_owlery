<?php
require 'functions.php';
require_once 'connect.php';
require 'header.php';
require 'login_check.php';




?>
<html>
<title>Expenses</title>
<body>
<?php
 $sql="SELECT * FROM expenses";
 $sql2= "SELECT * FROM expense_sources";
 $sql3= "SELECT * FROM expense_types";

$expenses = mysqli_query($dbcon,$sql);
$exp_srces = mysqli_query($dbcon, $sql2);
$exp_types = mysqli_query($dbcon, $sql3);



$exp_table = mysqli_query($dbcon, $sql);
$src_table = mysqli_query($dbcon, $sql);
$typ_table = mysqli_query($dbcon, $sql);
 

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
  


</body>
</html>