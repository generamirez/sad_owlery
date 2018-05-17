
<?php
require 'functions.php';
require 'scripts.php';
require_once 'connect.php';

$id = $_GET['id'];

$command= "SELECT *
FROM `employees`
WHERE `esource_id` = $id";


$sql= mysqli_query($dbcon, $command);
$row= mysqli_fetch_array($sql);
$esrc_id= $row['esource_id'];
//$exp_type= $row['exptype_id'];

//$getSQuery="SELECT src_name from expense_sources where src_id=$src_id";
//$sql1= mysqli_query($dbcon, $getSQuery);
//$source= mysqli_fetch_array($sql1);

//$src=$source['src_name'];



$getEQuery="SELECT * from employees where esource_id=$esrc_id";
$sql2= mysqli_query($dbcon, $getEQuery);
$typeArray= mysqli_fetch_array($sql2);
$type= $typeArray['first_name'];

if (isset($_POST['save_emp'])){

    $first= $_POST['first_name'];
    $middle= $_POST['middle_name'];
    $last= $_POST['last_name'];
    $birthday= $_POST['birthday'];
    $contact_number= $_POST['contact_number'];
    $position= $_POST['position'];
    $contract_start= $_POST['contract_start'];
    $employee_id= $_POST['employee_id'];

    
    $sql="UPDATE employees SET first_name=$first, middle=$middle, last=$last, birthday=$birthday, contact_number=$contact_number, position=$position, contract_start=$contract_start, employee_id=$employee_id where esource_id=$esrc_id";
    
    
    $result = mysqli_query($dbcon,$sql);
    if (!$result) {
      printf("Error: %s\n", mysqli_error($dbcon));
      exit();
    }
    else{
    header("location:employees_view.php");
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
      <div class="nav-elements"><h2> Edit Employee </h2> </div>
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
<div id="main" class="container">
    <form method="post" action="edit_employee.php?id=<?php echo $row['esource_id'];?>">
        <div class="row">
            <div class="col-md-4">
            First Name
            </div>

            <div class="col-md-4">
            Middle Name
            </div>
			
			<div class="col-md-4">
            Last Name
            </div>

        </div>

        <div class="row">
            <div class="col-md-4">
               <input name="first_name" type="text" value=<?php echo $row['first_name']; ?>> 
            </div>
			<div class="col-md-4">
               <input name="middle_name" type="text" value=<?php echo $row['middle_name']; ?>>
            </div>
			<div class="col-md-4">
               <input name="last_name" type="text" value=<?php echo $row['last_name']; ?>>
            </div>

        </div>

        <div class="row">
		
            <div class="col-md-6">
            Birthday
            </div>

            <div class="col-md-6">
            Contact Number
            </div>

        </div>
		
		<div class="row">
            <div class="col-md-6">
               <input id="birthday" name="birthday" type="date" value=<?php echo $row['birthday']; ?>> 
            </div>
			<div class="col-md-6">
               +639<input name="contact_number" type="tel" value=<?php echo $row['contact_number']; ?>>
            </div>
        </div>
		
		<div class="row">
		
            <div class="col-md-6">
            Position
            </div>

            <div class="col-md-6">
            Contract Start
            </div>

        </div>
		
		<div class="row">
            <div class="col-md-6">
               <input name="position" type="text" value=<?php echo $row['position']; ?>>
            </div>
			<div class="col-md-6">
                <input id="contract_start" name="contract_start" type="date" value=<?php echo $row['contract_start']; ?>> 
            </div>
            </div>
        <div class="row">
		<div class="col-md-6">
            <input type="submit" name="save_emp" value="Confirm" onClick="return confirm('This will overwrite the selected entry. Continue?');">
        </div>
        </div>
    </form>
</div>
 </body>
</html>
