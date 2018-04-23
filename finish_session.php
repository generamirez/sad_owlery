<?php require 'connect.php'?>

<?php require 'functions.php'?>
<?php require 'sidebar.php'?>

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
    $package= $row['new_package'];
    $voucher = $row['voucher_code'];
    $disc = $row["discount_amt"];
    $partner= $row["partnership"];
    $new= $row["new_package"];
    $s = strtotime($row['date_start']);

  $date = date('m/d/Y', $s);
  $time = date('h:i A', $s);


  $date2 = date('m/d/Y');
  $time2 = date('h:i A');
    if ($new==true){
        $new=1;
    }
    else{
        $new=0;
    }

    if ($partner==true){
        $partner=1;
    }
    else{
        $partner=0;
    }

}
?>

<html>
<div id="main">
<div class="container">
<div class="col-md-12">
    
<!-- Card -->
<div class="card">

<!-- Card image -->
<div class="view">

  <!-- Subtitle -->
  <h5>Payment Summary</h5>
  <!-- Title -->
  <h2 class="card-header-title"><?php echo $name; ?></h2>
  

</div>

<!-- Card content -->
<div class="card-body text-left">

<div class="row">
    <h5 class="col-md-6"> Time </h5>
    <h5 class="col-md-6"> Space </h5>
</div>

<div class="row">
    <h3 class="col-md-6"> <?php echo $time;  ?> - <?php echo $time2; ?> </h3>
    <h3 class="col-md-6"> <?php echo $space ?> </h3>
</div>

<div class="row">
    <h5 class="col-md-6"> Cash Voucher </h5>
    <h5 class="col-md-6"> People </h5>
</div>

<div class="row">
    <h3 class="col-md-6"> <?php echo $voucher; ?> </h3>
    <h3 class="col-md-6"> <?php echo $num ?> </h3>
</div>

<div class="row">
    <h5 class="col-md-6"> Package Type </h5>
    <h5 class="col-md-6"> Discount </h5>
</div>

<div class="row">
    <h3 class="col-md-6"> <?php echo $package; ?> </h3>
    <h3 class="col-md-6"> <?php echo $disc ?> </h3>
</div>

<div class="row">
<div class="col-md-6 text-right">
    <h5 class="col-md-12"> VATable Sales </h5>
    <h5 class="col-md-12"> VAT </h5>
</div>

<div class="col-md-6 text-right">
    
    <h5 class="col-md-6">value</h5>
    <h5 class="col-md-6">value</h5>
</div>  


</div>




  <!-- Text -->
  

</div>

</div>
<!-- Card -->




</div>

</html>
