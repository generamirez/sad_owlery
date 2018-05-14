
 <?php 
 require 'connect.php';
 require 'functions.php';?> 
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
 

    <div class="navbar-nav1" id="nav">
      <div class="nav-elements"><h2> Sessions </h2> </div>
      <div class="nav-elements"> <input type="text" name="search"></div>
      <div class="nav-elements"> <a href="add_session.php"><h4> Add Session </a><h4> </div>
    </div>
    

  </nav>

 <?php require 'sidebar.php'; ?>
<div id="main">
    <div>
    <div class="container row">
      <div class="block col-md-3">
      <h4> Number of Ongoing Sessions </h4>
     <!-- php stuff here -->
      <h2 class="count">
            <?php

         
          $sql="SELECT COUNT('session_id') FROM sessions where session_status=1";

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
      <div class="block col-md-3">
      <h4> Today's Total Number of Sessions </h4>
      <h2 class="count">
            <?php

          $sql="SELECT COUNT('session_id') FROM sessions where DATE(date_start)=DATE(CURDATE())";

          $result = mysqli_query($dbcon,$sql);
          if (!$result) {
              printf("Error: %s\n", mysqli_error($dbcon));
              exit();
          }

          $row=mysqli_fetch_array($result, MYSQLI_NUM);
          echo $row[0];



              ?>
      </div>
    </div>
    </div>


<div class="container">
  <h1> Session List </h1>


<?php


 $sql="SELECT * FROM sessions order by session_status desc";

$result = mysqli_query($dbcon,$sql);



$response = @mysqli_query($dbcon, $sql);
 

if($response){
 
echo '<table align="left"
cellspacing="5" cellpadding="8">
 
<tr>
<td align="left"><b>Date</b></td>
<td align="left"><b>Customer Name</b></td>
<td align="left"><b>Space</b></td>
<td align="left"><b>Entered At</b></td>
<td align="left"><b>Status</b></td>
<td align="left"><b>Controls</b></td>
</tr>';
 

while($row = mysqli_fetch_array($response)){

  $s = strtotime($row['date_start']);

  $date = date('m/d/Y', $s);
  $time = date('H:i:s A', $s);
  $id = $row['session_id'];
  if ($row['session_status']==1){
    $status= 'Active';
  }
  else{
    $status="Inactive";
  }

if($row['session_status']==1){

  ?>

 

<tr>
	<td><?php echo $date;?></td>
	<td><?php echo $row['customer_name'];?></td>
	<td><?php echo $row['space'];?></td>
	<td><?php echo $time;?></td>
	<td><?php echo $status;?></td>
	<td><a href="edit_session.php?id=<?php echo $row['session_id'];?>">Edit</a></td>
	<td><a href="delete_session.php?id=<?php echo $row['session_id'];?>" onClick="return confirm('Are you sure you want to delete?');">Rent</a></td>
  <td><a href="finish_session.php?id=<?php echo $row['session_id'];?>">Finish</a></td>
</tr>
  
<?php
}
  
else{
 ?>
 <tr>
	<td><?php echo $date;?></td>
	<td><?php echo $row['customer_name'];?></td>
	<td><?php echo $row['space'];?></td>
	<td><?php echo $time;?></td>
	<td><?php echo $status;?></td>
	<td><a href="view_receipt.php?id=<?php echo $row['session_id'];?>">View</a></td>
	<td><a href="delete_session.php?id=<?php echo $row['session_id'];?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>

</tr>
  <?php

}


}
 
echo '</table>';
 
} else {
 
echo "Couldn't issue database query<br/>";
 
echo mysqli_error($dbcon);
 
}
 

 
?>

  </div>

</body>
</html>
