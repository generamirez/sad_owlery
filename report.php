
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

if ($end < $start){
    echo "Error";
}
else{
    

        if ($type == "Revenue"){
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

    if ($type == "Expenses"){
        echo "  <table>
    <tr> 
        <th>Date </th>
        <th>Expense Type </th>
        <th>Source</th>
        <th>Voucher</th>
        <th>Amount</th>
        </tr>";
        $sql = "select DATE_FORMAT(expense_date, '%m/%d/%Y'), exptype_id, source_id, voucher_code, amount from expenses";
        
        $query = mysqli_query($dbcon, $sql);
        while ($row = mysqli_fetch_array($query, MYSQLI_NUM)){
  
            $query2 = "SELECT  src_id,src_name from expense_sources where src_id = $row[2] ";
                $getNames = mysqli_query($dbcon, $query2);
                while ($names = mysqli_fetch_array($getNames, MYSQLI_NUM)){
                    if ($names[0]==$row[2]){
                        $src_name= $names[1];
                        
                    }
                }
            
                $query3 = "SELECT  * from expense_types where exptype_id = $row[1] ";
                $getNames = mysqli_query($dbcon, $query3);
                while ($names = mysqli_fetch_array($getNames, MYSQLI_NUM)){
                    if ($names[0]==$row[1]){
                        $type_name= $names[1];
                    }
                }
               

        ?>
                <tr>
            <td> <?php echo $row[0]; ?> </td>
            <td> <?php echo $type_name; ?> </td>
            <td> <?php echo $src_name; ?> </td>
            <td> <?php echo $row[3]; ?> </td>
            <td> <?php echo $row[4]; ?> </td>
        </tr>
       

        <?php

        }
        echo '</table>';
        ?>
         <div class="row">
    <h2> Total Expense </h2>
    <h1> <?php 
        $command = "SELECT SUM(amount) from expenses";
        $sql =  mysqli_query($dbcon, $command);
        $amt = mysqli_fetch_array($sql, MYSQLI_NUM);
        echo $amt[0];
    
    ?> </h1>
    </div>
        
    <?php
     
    }
    
}
?>

</div>

</body>
</html>