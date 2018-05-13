<?php require_once 'connect.php'?>

<?php require 'functions.php'?>


<?php



$id = $_GET['id'];
$command= "SELECT *
FROM `sessions`
WHERE `session_id` =" .$id;



$sql = mysqli_query($dbcon, $command);
while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
    $name= $row['customer_name'];
    $space= $row['space'];
    $num= $row['number_of_people'];
    $voucher = $row['voucher_code'];
    $disc = $row["discount_amt"];
    $new= $row["new_package"];
    $type= $row["package_type"];
    $due = $row["amt_due"];
    
    $start = date('H:i A', strtotime($row['date_start']));
    $end = date('H:i A', strtotime($row['date_end']));

}

?>

<html>
<?php require 'sidebar.php'?>
<div id="main" class="container">
<h4> Customer Name </h4>

<h1> <?php echo $name; ?> </h1>
<hr>
<div class="row">
    <div class="col-md-6"> Time  </div>
    <div class="col-md-6"> Space </div>
</div>

<div class="row">
    <div class="col-md-6"><h4><?php echo $start." - ".$end; ?> </h4></div>
    <div class="col-md-6"><h4> <?php echo $space;?> </h4> </div>
</div>
<br>
<div class="row">
    <div class="col-md-6"> Cash Voucher </div>
    <div class="col-md-6"> People </div>
</div>

<div class="row">
    <div class="col-md-6"><h4><?php echo $voucher; ?> </h4></div>
    <div class="col-md-6"><h4> <?php echo $num;?> </h4> </div>
</div>
<hr>

<div class="row">
    <div class="col-md-6"> Package Type </div>
    <div class="col-md-6"> Discount </div>
</div>

<div class="row">
    <div class="col-md-6"><h4><?php echo $type; ?> </h4></div>
    <div class="col-md-6"><h4> <?php echo $disc;?> </h4> </div>
</div>

<div class="row">
    <div class="col-md-6"> VATable Sales </div>
    <div class="col-md-4" style="margin-left:80px;"> Php <?php echo number_format((float)$due/1.12, 2, '.', ''); ?> </div>
</div>

<div class="row">
    <div class="col-md-6" >VAT</div>
    <div class="col-md-4" style="margin-left:80px;"> Php<?php echo number_format((float)$due*.12, 2, '.', '');;?> </div>
</div>

<div class="row">
    <div class="col-md-6"><h4>TOTAL</h4></div>
    <div class="col-md-4"style="margin-left:50px;"><h3>Php<?php echo $due;?> </h3> </div>
 

</div>
<form method= "post" action ="sessions_view.php">
    <input type= "submit" value="Back">
</form>

</div>


</html>
