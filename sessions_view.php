
<?php require 'connect.php'?>
<?php require_once 'header.php'?>
<?php require 'login_check.php' ?>
<title>Sessions</title>
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


 $sql="SELECT * FROM sessions";

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
	<td><a href="delete_session.php?id=<?php echo $row['session_id'];?>" onClick="return confirm('Are you sure you want to delete?');">Delete</a></td>
  <td><a href="finish_session.php?id=<?php echo $row['session_id'];?>">Finish</a></td>
</tr>
  
<?php
}
  
else{
  $stat="Inactive";
  echo '<tr><td align="left">' . 
  $date . '</td><td align="left">' . 
  $row['customer_name'] . '</td><td align="left">' .
  $row['space'] . '</td><td align="left">' .
  $time . '</td><td align="left">' .
  $stat . '</td><td align="left">';
  
  echo '</tr>';

}


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
