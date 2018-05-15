
<?php require 'connect.php';
require 'scripts.php'; ?>
<title>Employees</title>
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
      <div class="nav-elements"><h2> Employees </h2> </div>
      <div class="nav-elements"> <a href="add_employee.php"><h4> Add Employee </a><h4> </div>
    </div>
    

  </nav>

 
<div id="main">
  <?php require 'sidebar.php'; ?>
    <div>
    <div class="container row">
      <div class="block col-md-3">
      <h4> Number of Employees </h4>
     <!-- php stuff here -->
      <h2 class="count">
            <?php

         
          $sql="SELECT COUNT('user_id') FROM employees";

          $result = mysqli_query($dbcon,$sql);
          if (!$result) {
              printf("Error: %s\n", mysqli_error($dbcon));
              exit();
          }

          $row=mysqli_fetch_array($result, MYSQLI_NUM);
          echo $row[0];



              ?>
      </h2>
      </div>
    </div>
    </div>


<div class="container">
  <h1> Employee List </h1>


<?php


 $sql="SELECT * FROM employees";

$result = mysqli_query($dbcon,$sql);



$response = mysqli_query($dbcon, $sql);
 

if($response){
 
echo '<table align="left"
cellspacing="5" cellpadding="8">
 
<tr>
<td align="left"><b>First Name</b></td>
<td align="left"><b>Middle Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Birthday</b></td>
<td align="left"><b>Contact Number</b></td>
<td align="left"><b>Position</b></td>
<td align="left"><b>Contract Start</b></td>
<td align="left"><b>Employee ID</b></td>
</tr>';
 
while($row = mysqli_fetch_array($response)){


  ?>

 

<tr>
	<td><?php echo $row['first_name'];?></td>
	<td><?php echo $row['middle_name'];?></td>
	<td><?php echo $row['last_name'];?></td>
	<td><?php echo $row['birthday'];?></td>
	<td>+639<?php echo $row['contact_number'];?></td>
	<td><?php echo $row['position'];?></td>
	<td><?php echo $row['contract_start'];?></td>
	<td><?php echo $row['employee_id'];?></td>
	<td><a href="edit_employee.php?id=<?php echo $row['session_id'];?>">Edit</a></td>
	<td><a href="delete_employee.php?id=<?php echo $row['session_id'];?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>
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
