
<?php require_once 'connect.php'?>
<?php require 'functions.php'?>
<?php require 'sidebar.php'?>
<title>Sessions</title>
<html lang="en">
<head>
<body>
  <nav class="navbar1">
   
    <div class="navbar-nav1" id="nav">
      <div class="nav-elements"><h2> Reports    </h2> </div>
    </div>
    

  </nav>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>

<div id="main" class="container">

<?php
$start= mysqli_escape_string($dbcon, $_POST['start']);
$end= mysqli_escape_string($dbcon, $_POST['end']);
$type= mysqli_escape_string($dbcon, $_POST['type']);


$date1 =  date( "M d, Y",strtotime($start) );

$date2 =  date( "M d, Y",strtotime($end) );
echo "$type Report <br>";
echo "$date1 - $date2";
if ($type == "Revenue"){
    $type1 = "sessions";
}
if ($end < $start){
    echo "Error";
}
else{
    echo "  <table>
    <tr> 
        <th>Date </th>
        <th>Day </th>
        <th>Total sessions</th>
        <th>Total People </th>
        <th>Amount</th>
        </tr>";
    $sql = "select DATE_FORMAT(date_end, '%m/%d/%Y'),DATE_FORMAT(date_end, '%W'), COUNT(session_id), SUM(number_of_people), SUM(amt_due) from sessions where date_end between '$start' and '$end' group by DATE_FORMAT(date_end, '%m/%d/%Y') AND session_status=0";
    $query = mysqli_query($dbcon, $sql);
    if ($type1 == "sessions"){
    while ($row=mysqli_fetch_array($query, MYSQLI_NUM)){

        ?>
         
        <tr>
            <td> <?php echo $row[0]; ?> </td>
            <td> <?php echo $row[1]; ?> </td>
            <td> <?php echo $row[2]; ?> </td>
            <td> <?php echo $row[3]; ?> </td>
            <td> <?php echo $row[4]; ?> </td>
        </tr>
    


    <?php
    }
    echo "    </table>";
    }
}
?>
</div>
</body>
</html>