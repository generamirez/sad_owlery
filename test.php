<?

session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="owlery_sad"; // Database name
$tbl_name="users"; // Table name
// Connect to server and select databse.
$dbcon=mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");
 $sql="SELECT date_start,customer_name,space_rented,date_start, session_status FROM sessions";

$result = mysqli_query($dbcon,$sql);


// $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
$response = @mysqli_query($dbcon, $sql);
 
// If the query executed properly proceed
if($response){
 
echo '<table align="left"
cellspacing="5" cellpadding="8">
 
<tr>
<td align="left"><b>Time Start</b></td>
<td align="left"><b>Customer Name</b></td>
<td align="left"><b>Space</b></td>
<td align="left"><b>Time start</b></td>
<td align="left"><b>Status</b></td>
</tr>';
 
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="left">' . 
$row['date_start'] . '</td><td align="left">' . 
$row['customer_name'] . '</td><td align="left">' .
$row['space_rented'] . '</td><td align="left">' .
$row['date_start'] . '</td><td align="left">' .
$row['session_status'] . '</td><td align="left">';
 
echo '</tr>';
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