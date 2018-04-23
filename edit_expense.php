
<?php
require 'functions.php';
require 'scripts.php';
require_once 'connect.php';

$id = $_GET['id'];
$command= "SELECT *
FROM `sessions`
WHERE `session_id` =" .$id;

$sql = mysqli_query($dbcon, $command);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
if(isset($_POST['save_btn'])){

    $name= $_POST['customer_name'];
    $space= $_POST['space'];
    $num= $_POST['custom_num'];
    $package= $_POST['package'];
    $voucher = $_POST['voucher'];
    $disc = $_POST["disc"];
    $partner= $_POST["partner"];
    $new= $_POST["new"];

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
    
    $sql="UPDATE sessions SET customer_name='$name', space='$space', number_of_people='$num', package_type='$package',voucher_code='$voucher',
     discount_amt='$disc', new_package='$new', partnership='$partner' where session_id ='$id'
    ";
    
    
    $result = mysqli_query($dbcon,$sql);
    if (!$result) {
      printf("Error: %s\n", mysqli_error($dbcon));
      exit();
    }
    else{
    header("location:sessions_view.php");
    }

}

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
      <div class="nav-elements"><h2> Edit Session </h2> </div>
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
<div id="main">
<div class="container">
  <title>Edit Sessions</title>
    <form method="post" action="edit_session.php?id=<?php echo $row['session_id'];?>">
	<div class="row">
             <h5 class="col-md-6"> Expense Type </h5>
             <h5 class="col-md-6"> Amount </h5>
    </div>


    <div class="row">
            <select class="col-md-5" required>
            <?php 
                $command= "SELECT * from expense_types";
                $result = mysqli_query($dbcon, $command);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $id=$row['exptype_id'];
                    $name=$row['exptype_name'];

            ?>
                <option value ="<?php echo $name; ?>"> <?php echo $name; ?> </option>
                <?php } ?>
                </select>
            <div class="col-md-1"> </div>
            <input type="number" class="col-md-4" required> </input>
    </div>

    <div class="row">
            <h5 class="col-md-6"> Source </h5>
            <h5 class="col-md-6"> Cash Voucher </h5>
    </div>


    <div class="row">
            <select class="col-md-5" required>
            <?php 
                $command= "SELECT * from expense_sources";
                $result = mysqli_query($dbcon, $command);
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $id=$row['exptype_id'];
                    $name=$row['src_name'];

            ?>
                <option value ="<?php echo $name; ?>"> <?php echo $name; ?> </option>
                <?php } ?>
                </select>
            <div class="col-md-1"> </div>
            <input type="number" class="col-md-4" required> </input>
    </div>
</div>
</form>

</div>
</div>
 </body>
</html>
